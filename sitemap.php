<?php
include 'sitemap-generator.php';
$config = include('sitemap-config.php');
$smg = new SitemapGenerator($config);
$smg->GenerateSitemap();
?>
