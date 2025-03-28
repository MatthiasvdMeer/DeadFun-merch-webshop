<?php
    // functie: formulier en database insert fiets
    // auteur: Vul hier je naam in

    echo "<h1>Insert Product</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('Product is toegevoegd')</script>";
        } else {
            echo '<script>alert("Product is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="prodNaam">prodNaam:</label>
        <input type="text" id="prodNaam" name="prodNaam" required><br>

        <label for="prijs">Prijs:</label>
        <input type="number" id="prijs" name="prijs" required><br> <!-- Changed to type="number" -->

        <label for="Foto">Foto:</label>
        <input type="text" id="Foto" name="Foto" ><br> <!-- Changed to type="text" -->

        <label for="leverancierID">leverancierID:</label>
        <input type="number" id="leverancierID" name="leverancierID" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>
