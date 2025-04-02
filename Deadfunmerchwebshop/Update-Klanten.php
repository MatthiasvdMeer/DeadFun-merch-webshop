<?php
require_once 'Functions-Klanten.php';

if (isset($_GET['id'])) {
    $klant = GetKlantById($_GET['id']);
    if (empty($klant)) {
        echo "<p>Klant niet gevonden.</p>";
        return;
    }
} else {
    echo "<p>Geen ID opgegeven.</p>";
    return;
}

if (isset($_POST['submit'])) {
    UpdateKlant($_POST);
    echo '<script>alert("Klant bijgewerkt")</script>';
    echo "<script> location.replace('CRUD-Klanten.php'); </script>";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Bijwerken</title>
</head>
<body>
    <h2>Klant Bijwerken</h2>
    <form action="Update-Klanten.php?id=<?php echo $klant['klantID']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $klant['klantID']; ?>">
        <input type="text" name="voornaam" value="<?php echo htmlspecialchars($klant['voornaam']); ?>" required><br>
        <input type="text" name="achternaam" value="<?php echo htmlspecialchars($klant['achternaam']); ?>" required><br>
        <input type="submit" name="submit" value="Bijwerken"><br>
    </form>
    <a href='klant.php'>Terug naar overzicht</a>
</body>
</html>