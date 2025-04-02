<?php
// functie: update Product
// auteur: Vul hier je naam in

require_once('functionsproduct.php');

if (isset($_POST['btn_wzg'])) {
    $row = [
        'prodId' => $_POST['prodId'],
        'prodNaam' => $_POST['prodNaam'],
        'prijs' => $_POST['prijs'],
        'leverancierID' => $_POST['leverancierID']
    ];

    if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] == 0) {
        $image = $_FILES['Foto']['tmp_name'];
        $row['Foto'] = file_get_contents($image);
    } else {
        $row['Foto'] = $row['Foto'] ?? null; // Keep the existing image if no new file is uploaded
    }

    if (updateRecord($row)) {
        echo "<script>alert('Product is bijgewerkt')</script>";
        echo "<script>location.replace('indexproduct.php');</script>";
    } else {
        echo "<script>alert('Product is NIET bijgewerkt')</script>";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getRecord($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig Product</title>
</head>
<body>
  <h2>Wijzig Product</h2>
  <form method="post" enctype="multipart/form-data">
    <input type="hidden" id="prodId" name="prodId" required value="<?php echo htmlspecialchars($row['prodID']); ?>"><br>
    <label for="prodNaam">prodNaam:</label>
    <input type="text" id="prodNaam" name="prodNaam" required value="<?php echo htmlspecialchars($row['prodNaam']); ?>"><br>

    <label for="prijs">prijs:</label>
    <input type="text" id="prijs" name="prijs" required value="<?php echo htmlspecialchars($row['prijs']); ?>"><br>

    <label for="Foto">Foto:</label>
    <input type="file" id="Foto" name="Foto"><br>
    <?php if (!empty($row['Foto'])): ?>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Foto']); ?>" alt="Current Image" style="width:100px;height:auto;"><br>
    <?php endif; ?>

    <label for="leverancierID">leverancierID:</label>
    <input type="number" id="leverancierID" name="leverancierID" required value="<?php echo htmlspecialchars($row['leverancierID']); ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='indexproduct.php'>Home</a>
</body>
</html>

<?php
} else {
    echo "Geen id opgegeven<br>";
}
?>