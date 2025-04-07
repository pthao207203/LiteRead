<?php

class SitemapGenerator
{
    // Config file with crawler/sitemap options
    private $config;

    // Array containing all scanned pages
    private $scanned;

    // The base of the given site URL
    private $site_url_base;

    // File where sitemap is written to.
    private $sitemap_file;

    // Constructor sets the given file for internal use
    public function __construct($conf)
    {
        // Setup class variables using the config
        $this->config = $conf;
        $this->scanned = [];
        $this->site_url_base = parse_url($this->config['SITE_URL'])['scheme'] . "://" . parse_url($this->config['SITE_URL'])['host'];
        $this->sitemap_file = fopen($this->config['SAVE_LOC'], "w");
    }

    // Function to start the sitemap generation process
    public function GenerateSitemap()
    {
        // Call the recursive crawl function with the start URL
        $this->crawlPage($this->config['SITE_URL']);

        // Generate a sitemap with the scanned pages
        $this->generateFile($this->scanned);
    }

    // Get the HTML content of a page and return it as a DOM object
    // Get the html content of a page and return it as a dom object
    private function getHtml($url)
    {
        // Get html from the given page
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Enable following redirects
        $html = curl_exec($curl);
    
        // Check if curl returned false (request failed)
        if ($html === false) {
            echo "Error fetching URL: $url\n";
            curl_close($curl);
            return null;
        }
    
        // Check if the HTTP status code is 200
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($http_code != 200) {
            echo "Error: Received HTTP status code $http_code for URL: $url\n";
            curl_close($curl);
            return null;
        }
    
        curl_close($curl);
    
        // Load the html and store it into a DOM object
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
    
        return $dom;
    }

    // Recursive function that crawls a page's anchor tags and store them in the scanned array
    private function crawlPage($page_url)
    {
        $url = filter_var($page_url, FILTER_SANITIZE_URL);

        // Check if the URL is invalid or if the page is already scanned
        if (in_array($url, $this->scanned) || !filter_var($page_url, FILTER_VALIDATE_URL)) {
            return;
        }

        // Add the page URL to the scanned array
        array_push($this->scanned, $url);

        // Get the HTML content from the page
        $html = $this->getHtml($url);
        $anchors = $html->getElementsByTagName('a');

        // Loop through all anchor tags on the page
        foreach ($anchors as $a) {
            $next_url = $a->getAttribute('href');

            // Skip links with certain IDs if specified in the config
            if ($this->config['CRAWL_ANCHORS_WITH_ID'] != "") {
                if ($a->getAttribute('id') != "" && $a->getAttribute('id') == $this->config['CRAWL_ANCHORS_WITH_ID']) {
                    continue;
                }
            }

            // Split page URL into base and extra parameters
            $base_page_url = explode("?", $page_url)[0];

            // Skip URL if it starts with '#' or equals root
            if (!$this->config['ALLOW_ELEMENT_LINKS']) {
                if (substr($next_url, 0, 1) == "#" || $next_url == "/") {
                    continue;
                }
            }

            // Skip external URLs if configured
            if (!$this->config['ALLOW_EXTERNAL_LINKS']) {
                $parsed_url = parse_url($next_url);
                if (isset($parsed_url['host'])) {
                    if ($parsed_url['host'] != parse_url($this->config['SITE_URL'])['host']) {
                        continue;
                    }
                }
            }

            // Convert relative link to absolute link if needed
            if (substr($next_url, 0, 7) != "http://" && substr($next_url, 0, 8) != "https://") {
                $next_url = $this->convertRelativeToAbsolute($base_page_url, $next_url);
            }

            // Skip links based on specific keywords
            $found = false;
            foreach ($this->config['KEYWORDS_TO_SKIP'] as $skip) {
                if (strpos($next_url, $skip) || $next_url === $skip) {
                    $found = true;
                }
            }

            // Continue crawling if the link should not be skipped
            if (!$found) {
                $this->crawlPage($next_url);
            }
        }
    }

    // Convert a relative link to an absolute link
    private function convertRelativeToAbsolute($page_base_url, $link)
    {
        $first_character = substr($link, 0, 1);
        if ($first_character == "?" || $first_character == "#") {
            return $page_base_url . $link;
        } else if ($first_character != "/") {
            return $this->site_url_base . "/" . $link;
        } else {
            return $this->site_url_base . $link;
        }
    }

    // Function to generate a Sitemap with the given pages array where the script has run through
    private function generateFile($pages)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <!-- ' . count($pages) . ' total pages-->
        <!-- PHP-sitemap-generator by https://github.com/tristangoossens -->';

        // Print the amount of pages
        echo count($pages);

        // Loop through each scanned page and generate the sitemap
        foreach ($pages as $page) {
            $xml .= "<url><loc>" . $page . "</loc>
            <lastmod>" . $this->config['LAST_UPDATED'] . "</lastmod>
            <changefreq>" . $this->config['CHANGE_FREQUENCY'] . "</changefreq>
            <priority>" . $this->config['PRIORITY'] . "</priority></url>";
        }

        $xml .= "</urlset>";
        $xml = str_replace('&', '&amp;', $xml);

        // Format string to XML
        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($xml);
        $dom->formatOutput = TRUE;

        // Write XML to file and close it
        fwrite($this->sitemap_file, $dom->saveXML());
        fclose($this->sitemap_file);
    }
}
?>
