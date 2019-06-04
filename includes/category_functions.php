<?php
/*
 * Visar alla kunder
*/
function getkategori($conn){
    $query = "SELECT kategoriGenre FROM kategori";

     //$query = "SELECT * FROM customer ORDER BY customerName ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_all($result);

    return $row;
}


/*
 * Hämtar en kund    //Create table , oop
 */
function getkategoriData($conn,$KategoriGenre){
    $query = "SELECT * FROM kategori
			WHERE kategoriGenre=".$KategoriGenre;




    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

/*
 * Sparar en kund
*/
function savekategori($conn){
    $date = date("Y-m-d H:i:s");
    $KategoriGenre = escapeInsert($conn,$_POST['kategoriGenre']);



    $query = "INSERT INTO kategori
			(kategoriGenre)
			VALUES('$KategoriGenre',)";


    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

/*
 * Uppdaterar en kund
*/
function updatekategori($conn){
    $KategoriGenre = escapeInsert($conn,$_POST['kategoriGenre']);
    $editid = $_POST['kategoriId'];

    $query = "UPDATE kategori
			SET spelNamn='$KategoriGenre',
			WHERE kategoriId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Raderar kund
*/
function deletekategori($conn,$KategoriGenre){
    $query = "DELETE FROM kategori WHERE kategoriGenre=". $KategoriGenre;
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
