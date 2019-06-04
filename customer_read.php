<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/conn_mysql.php");//sidan hämtar info från databasen så att sidan funkar
require("includes/customer_functions.php");//sidan hämtar info från funktioner så att sidan funkar


// Skapar databaskopplingen
$connection = dbConnect();
//definera variabler
$AllspelData = "";


if(isset($_GET['spelId']) && $_GET['spelId'] > 0 ){
    $AllspelData = getAllspelData($connection,$_GET['spelId']);
}else{
    echo "Inget giltligt ID";
}  //isset = om en variabel är deklarerad, $_GET = hämtar info från din utvalda url, om värdet spelId är större än noll körs variabeln AllspelData som har värdet AllspelData som är en funktion och if satsen ansluter inuti arrayen spelId med $_GET. Annars visar du texten inget giltigt id.


$output = $AllspelData;// definerar en variabel output som har värdet variabeln $allSpelData.

echo json_encode($output); //variabeln output hamnar inuti funktionen json_encode som därmed visar json kod med output

// Stänger databaskopplingen
dbDisconnect($connection);
?>
