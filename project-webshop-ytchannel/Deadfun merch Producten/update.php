<?php
    // functie: update Product
    // auteur: Vul hier je naam in

    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateRecord($_POST) == true){
            echo "<script>alert('Product is gewijzigd')</script>";
        } else {
            echo '<script>alert("Product is NIET gewijzigd")</script>';
        }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['id'])){  
        // Haal alle info van de betreffende id $_GET['id']
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
  <form method="post">
    
    <input type="hidden" id="prodId" name="prodId" required value="<?php echo $row['prodID']; ?>"><br> <!-- Corrected to use prodId -->
    <label for="prodNaam">prodNaam:</label>
    <input type="text" id="prodNaam" name="prodNaam" required value="<?php echo $row['prodNaam']; ?>"><br>

    <label for="prijs">prijs:</label>
    <input type="text" id="prijs" name="prijs" required value="<?php echo $row['prijs']; ?>"><br>

    <label for="Foto">Foto:</label>
    <input type="number" id="Foto" name="Foto" value="<?php echo $row['Foto']; ?>"><br>

    <label for="leverancierID">leverancierID:</label>
    <input type="number" id="leverancierID" name="leverancierID" required value="<?php echo $row['leverancierID']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='index.php'>Home</a>
</body>
</html>

<?php
    } else {
        echo "Geen id opgegeven<br>";
    }
?>