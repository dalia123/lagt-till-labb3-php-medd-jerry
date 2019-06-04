<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

if(isset($_POST['spelNamn'])){ // om värdet spelNamn är deklarerat körs variabeln $Namn som har värdet strängen spelNamn inuti arrayen annars visas ingen tillåten post med värdet spelNamn inuti funktionen exit. $GET_POST = hämtar information från urlen. Post lägg till objekt.
    $Namn = $_POST['spelNamn'];
}else{
    echo "Ingen tillåten post (spelNamn)";
    exit;
}
if(isset($_POST['spelBolag'])){
    $Bolag = $_POST['spelBolag'];
}else{
    echo "Ingen tillåten post (spelBolag)";
    exit;
}
if(isset($_POST['spelUtgivningsar'])){
    $Ar = $_POST['spelUtgivningsar'];
}else{
    echo "Ingen tillåten post (spelUtgivningsar)";
    exit;
}

if(isset($_POST['spelBeskrivning'])){
    $Beskrivning = $_POST['spelBeskrivning'];
}else{
    echo "Ingen tillåten post (spelBeskrivning)";
    exit;
}

if(isset($_POST['spelKategoriId'])){
    $Kategori = $_POST['spelKategoriId'];
}else{
    echo "Ingen tillåten post (spelKategoriId)";
    exit;
}

/*if(isset($_POST['kategoriGenre'])){
    $Kategori = $_POST['kategoriGenre'];
}else{
    echo "Ingen tillåten post (kategoriGenre)";
    exit;
}*/


$savespel = saveAllspel($connection); //  $savespel är en variabel som har värdet funktionen
//saveAllspel och inuti funktionen visas variabeln connection för att det ska fungera med databas kopplingen.

if(isset($savespel) && $savespel > 0 ) {
    $allSpelData = getAllspelData($connection,$savespel); //isset = om en variabel är deklarerad, $savespel, $savespel är större än noll
    //körs variabeln $allSpelData som har värdet funktionen getAllspelData
    //med $connection, $savespel inuti funktionen som visar dina sparade spel och att det funkar meed databas koppling.




    $output = $allSpelData; // definerar en variabel output som har värdet variabeln $allSpelData.


    echo json_encode($output); //variabeln output hamnar inuti funktionen json_encode som därmed visar json kod med output.
}

// Stänger databaskopplingen
dbDisconnect($connection);
?>
