<?php
// auteur: Vul hier je naam in
// functie: verwijder een bier op basis van de id
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['id'])){

    // test of insert gelukt is
    if(deleteRecord($_GET['id']) == true){ // Ensure id matches the correct field in the database
        echo '<script>alert("productcode: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("Product is NIET verwijderd")</script>';
    }
}
?>

