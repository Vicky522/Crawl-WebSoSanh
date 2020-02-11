<?php
require 'search-db.php';

// search
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['name'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `search` WHERE nguyenkim( `title`) LIKE '%" . $name . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `search`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect('localhost', 'root', 'Vothanhvan522');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<?php require 'crawl.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="crawl__image">
            <?= "<img src='$s'>" ?>
        </div>
        <h1 class="crawl__title"><?= $title->plaintext ?></h1>
        <h2 class="crawl__price"><?= $price->outertext ?></h2>
        <h3 class="crawl__store">
            <a href="<?= $url ?>">Đến nơi bán</a>
        </h3>
    </div>
</body>

</html>