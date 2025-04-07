<?php
return array(
    "SITE_URL" => "https://litereadstory.com/",  // Địa chỉ trang web của bạn
    "ALLOW_EXTERNAL_LINKS" => false,             // Không crawl các liên kết ngoài
    "ALLOW_ELEMENT_LINKS" => false,              // Không crawl các liên kết trong cùng một trang (hash links)
    "CRAWL_ANCHORS_WITH_ID" => "",               // Chỉ crawl các anchor tag với ID cụ thể (nếu cần)
    "KEYWORDS_TO_SKIP" => array(),               // Các trang cần bỏ qua khi crawl
    "SAVE_LOC" => "sitemap.xml",                 // Đường dẫn để lưu sitemap
    "PRIORITY" => 1,                             // Ưu tiên tĩnh cho các trang
    "CHANGE_FREQUENCY" => "daily",              // Tần suất cập nhật các trang
    "LAST_UPDATED" => date('Y-m-d'),             // Ngày cập nhật (hôm nay)
);
?>
