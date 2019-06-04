<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/conn_mysql.php");
require("includes/category_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();
//definera variabler
$KategoriData = "";

if(isset($_GET['kategoriGenre']) && $_GET['kategoriGenre'] > 0 ){
    $KategoriData = getkategoriData($connection,$_GET['kategoriGenre']);
}else{
    echo "Inget giltligt ID";
}

$output = $KategoriData;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>
