<?php
require 'simple_html_dom.php';
$url = 'https://www.nguyenkim.com/may-anh-canon-eos-3000d-kit-18-55-dc-iii.html';
$html = file_get_html($url);
// $test =$html->find('title',0);

// get image form web
$hinh = $html->find('img.img-full-width');
foreach ($hinh as $h) {
    $s = $h->src;

    // echo "<img src='$s'>";



    // // Lưu hình đã crawl vào folder của mình
    $img = 'image/hinh/' . basename($s);
    file_put_contents($img, file_get_contents($s));
}
$title = $html->find('h1.product_info_name', 0);

// echo $title->plaintext;


// get price from web
$price = $html->find('span.nk-price-final', 0);
// echo $price->outertext;

// INSERT DATABASE
require 'search-db.php';
$query = mysqli_query($conn, "INSERT INTO `nguyenkim` VALUES(null, `$title`, `$price`, `$s`);");
