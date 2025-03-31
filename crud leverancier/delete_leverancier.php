<?php
// auteur: Wigmans
// functie: verwijder een leverancier op basis van de leverancierID
include 'functions.php';
 
// Haal leverancier uit de database
if(isset($_GET['leverancierID'])){
    Deleteleverancier($_GET['leverancierID']);
 
    echo '<script>alert("leverancierID: ' . $_GET['leverancierID'] . ' is verwijderd")</script>';
    echo "<script> location.replace('crud_leverancieren.php'); </script>";
}
?>