<?php
require_once 'Functions-Klanten.php';

if (isset($_GET['id'])) {
    DeleteKlant($_GET['id']);
    echo '<script>alert("Klant verwijderd")</script>';
    echo "<script> location.replace('klant.php'); </script>";
} else {
    echo "<p>Geen ID opgegeven.</p>";
}
?>