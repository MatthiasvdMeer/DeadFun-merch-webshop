<?php
require_once 'Functions-Klanten.php';

if (isset($_POST['submit'])) {
    InsertKlant($_POST);
    echo '<script>alert("Klant toegevoegd")</script>';
    echo "<script> location.replace('CRUD-Klanten.php'); </script>";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Toevoegen</title>
</head>
<body>
    <h2>Nieuwe Klant Toevoegen</h2>
    <form action="Insert-Klanten.php" method="post">
        <input type="text" name="voornaam" placeholder="Voornaam" required><br>
        <input type="text" name="achternaam" placeholder="Achternaam" required><br>
        <input type="submit" name="submit" value="Toevoegen"><br>
    </form>
    <a href='CRUD-Klanten.php'>Terug naar overzicht</a>
</body>
</html>