<?php

require_once('functions-leverancier.php');

// Test of er op de knop is gedrukt
if (isset($_POST['btn_ins'])) {
    Insertleverancier($_POST);
    echo '<script>alert("Leverancier: ' . $_POST['leverancierNaam'] . ' is toegevoegd")</script>';
    echo '<script> location.replace("crud_leverancier.php"); </script>';
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Leverancier</title>
</head>
<body>
    <h1>Insert Leverancier Info</h1>
    <h2>Voeg een nieuwe leverancier toe</h2>

    <form method="post">
        <label for="leverancierNaam">Naam:</label>
        <br>
        <input type="text" id="leverancierNaam" name="leverancierNaam" required>
        <br>

        <label for="leverancierAchternaam">Achternaam:</label>
        <br>
        <input type="text" id="leverancierAchternaam" name="leverancierAchternaam" required>
        <br>

        <label for="contact">Contact:</label>
        <br>
        <input type="text" id="contact" name="contact" required>
        <br>

        <button type="submit" name="btn_ins">Create NOW!!!</button>
    </form>
    <form action="crud_leverancier.php">
        <button type="submit">HOME</button>
    </form>
</body>
</html>