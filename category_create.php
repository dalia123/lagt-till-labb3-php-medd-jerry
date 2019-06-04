<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();




if(isset($_POST['kategoriGenre'])){
    $Namn = $_POST['kategoriGenre'];
}else{
    echo "Ingen tillåten post (kategoriGenre)";
    exit;
}



$savekategori = savekategori($connection);

if(isset($savekategori) && $savekategori > 0 ) {
    $KategoriData = getkategoriData($connection,$savekategori);

    $output = $KategoriData;

    echo json_encode($output);
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>
