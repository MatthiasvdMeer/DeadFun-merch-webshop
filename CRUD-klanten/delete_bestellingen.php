<?php
include 'functions.php';


if(isset($_GET['bestellingID'])){


    if(Deletebestellingen($_GET['bestellingID']) == true){
        echo '<script>alert("bestellingID: ' . $_GET['bestellingID'] . ' is verwijderd")</script>';
        echo "<script> location.replace('bestellingen.php'); </script>";
        exit();
    } else {
        echo '<script>alert("bestelling is NIET verwijderd")</script>';
    }
}
?>