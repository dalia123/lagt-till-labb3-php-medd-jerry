<?php
/*
 * Visar alla kunder
*/
function getAllspel($conn){
    $query = "SELECT spelNamn, kategoriGenre FROM kategori
    INNER JOIN spel ON kategori.kategoriId = spel.spelKategoriid
     ORDER BY spelNamn";
     //$query = "SELECT * FROM customer ORDER BY customerName ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}

/*
 * Hämtar en kund    //Create table , oop
 */
function getAllspelData($conn,$spelId){
    $query = "SELECT * FROM spel
			WHERE spelId=".$spelId;




    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

/*
 * Sparar en kund
*/
function saveAllspel($conn){
    $date = date("Y-m-d H:i:s");
    $spelNamn = escapeInsert($conn,$_POST['spelNamn']);
    $spelBolag = escapeInsert($conn,$_POST['spelBolag']);
    $spelUtgivningsar = escapeInsert($conn,$_POST['spelUtgivningsar']);
    $spelKategoriId = escapeInsert($conn,$_POST['spelKategoriId']);
    $spelBeskrivning = escapeInsert($conn,$_POST['spelBeskrivning']);


    $query = "INSERT INTO spel
			(spelNamn, spelBolag, spelUtgivningsar, spelBeskrivning,spelKategoriId)
			VALUES('$spelNamn','$spelBolag', '$spelUtgivningsar','$spelBeskrivning',$spelKategoriId)";


    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

/*
 * Uppdaterar en kund
*/
function updateAllspel($conn){
    $spelNamn = escapeInsert($conn,$_POST['spelNamn']);
    $spelBolag = escapeInsert($conn,$_POST['spelBolag']);
    $spelUtgivningsar = escapeInsert($conn,$_POST['spelUtgivningsar']);
    $spelBeskrivning = escapeInsert($conn,$_POST['spelBeskrivning']);
    $spelKategoriId = escapeInsert($conn,$_POST['spelKategoriId']);
    $spelId = escapeInsert($conn,$_POST['spelId']);
    $editid = $_POST['txtspelId'];

    $query = "UPDATE spel
			SET spelNamn='$spelNamn',
      spelBolag='$spelBolag',
      spelUtgivningsar='$spelUtgivningsar',
      spelBeskrivning='$spelBeskrivning',
      spelKategoriId='$spelKategoriId'
			WHERE spelId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Raderar kund
*/
function deleteAllspel($conn,$spelId){
    $query = "DELETE FROM spel WHERE spelId=". $spelId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Tar bort oönskade html-tecken
 *
 * mysqli_real_escape_string motverkar SQLInjection
 */
function escapeInsert($conn,$insert) {
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn,$insert);

    return $insert;
}
