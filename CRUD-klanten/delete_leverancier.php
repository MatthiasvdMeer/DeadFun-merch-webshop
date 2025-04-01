<?php
require_once 'functions-leverancier.php';

if (isset($_POST['leverancierID'])) {
    Deleteleverancier($_POST['leverancierID']);
    echo '<script>alert("Leverancier verwijderd")</script>';
    echo "<script> location.replace('crud_leverancier.php'); </script>";
} else {
    echo '<script>alert("Geen leverancierID opgegeven.")</script>';
    echo "<script> location.replace('crud_leverancier.php'); </script>";
}
?>