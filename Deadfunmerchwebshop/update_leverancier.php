<?php
require_once('functions-leverancier.php');

if (isset($_POST['btn_wzg'])) {
    UpdateLeverancier($_POST);
    echo "<script>alert('Leverancier is bijgewerkt')</script>";
    echo "<script> location.replace('index.php'); </script>";
}

if (isset($_GET['leverancierID'])) {
    $leverancier = Getleverancier($_GET['leverancierID']);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig Leverancier</title>
</head>
<body>
    <h2>Wijzig Leverancier</h2>
    <form method="post">
        <input type="hidden" name="leverancierID" value="<?php echo $leverancier['leverancierID']; ?>">
        
        <label for="leverancierNaam">Naam:</label>
        <input type="text" id="leverancierNaam" name="leverancierNaam" value="<?php echo $leverancier['leverancierNaam']; ?>" required><br>
        
        <label for="leverancierAchternaam">Achternaam:</label>
        <input type="text" id="leverancierAchternaam" name="leverancierAchternaam" value="<?php echo $leverancier['leverancierAchternaam']; ?>" required><br>
        
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $leverancier['contact']; ?>" required><br>
        
        <input type="submit" name="btn_wzg" value="Wijzig">
    </form>
    <br><br>
    <a href="index.php">Terug naar overzicht</a>
</body>
</html>
<?php
} else {
    echo "Geen leverancierID opgegeven.";
}
?>