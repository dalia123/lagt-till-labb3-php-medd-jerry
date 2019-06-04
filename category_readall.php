<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/conn_mysql.php");
require("includes/category_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla kunder
$kategori = getkategori($connection);
$output = $kategori;

echo json_encode($output);

// Stänger databaskopplingen
dbDisconnect($connection);
?>
