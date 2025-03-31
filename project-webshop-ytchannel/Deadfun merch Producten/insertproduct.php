<?php
    // functie: formulier en database insert product met afbeelding
    // auteur: Vul hier je naam in

    echo "<h1>Insert Product</h1>";

    require_once('functionsproduct.php');
    
    $conn = new mysqli("localhost", "root", "", "deadfunmerch");
    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }

    if(isset($_POST['btn_ins'])) {
        $prodNaam = $_POST['prodNaam'];
        $prijs = $_POST['prijs'];
        $leverancierID = $_POST['leverancierID'];
        
        if(isset($_FILES['Foto']) && $_FILES['Foto']['error'] == 0) {
            $image = $_FILES['Foto']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $sql = "INSERT INTO producten (prodNaam, prijs, Foto, leverancierID) VALUES ('$prodNaam', '$prijs', '$imgContent', '$leverancierID')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Product is toegevoegd')</script>";
            } else {
                echo "<script>alert('Product is NIET toegevoegd: " . $conn->error . "')</script>";
            }
        } else {
            echo "<script>alert('Geen afbeelding geselecteerd of een fout opgetreden')</script>";
        }
    }
    $conn->close();
?>
<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <label for="prodNaam">prodNaam:</label>
            <input type="text" id="prodNaam" name="prodNaam" required><br>

            <label for="prijs">Prijs:</label>
            <input type="number" id="prijs" name="prijs" required><br>

            <label for="Foto">Foto:</label>
            <input type="file" id="Foto" name="Foto" required><br>

            <label for="leverancierID">leverancierID:</label>
            <input type="number" id="leverancierID" name="leverancierID" required><br>

            <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='indexproduct.php'>Home</a>
    </body>
</html>