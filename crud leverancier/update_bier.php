<?php
    require_once ('functions.php');

    //test of er op de knop is gedrukt
    if(isset($_POST['btn_wzg'])){

            Updateleverancier($_POST);
    }
    if(isset($_GET['leverancierID'])){
$leverancierID = $_GET['leverancierID'];
$row = GetData($leverancierID);
        
}


?>

<html>
    <body>
<form action= "CRUD_leverancieren.php" method= "post">
<br>
        <label for="leverancierID">leverancierID:</label>
        <input type="number" id="leverancierID" name="leverancierID" required>
<br>
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required>
<br>
        <label for="soort">Soort:</label>
        <input type="text" id="soort" name="soort" required>
<br>
        <label for="stijl">Stijl:</label>
        <input type="text" id="stijl" name="stijl" required>
<br>
        <label for="alcohol">Alcoholpercentage:</label>
        <input type="number" id="alcohol" name="alcohol" step="0.1" min="0" max="100" required>
<br>
        <label for="brouwID">BrouwID:</label>
        <input type="number" id="brouwID" name="brouwID" required>
<br>
        <button type="submit" name="btn_wzg">wijgig</button></form>

</body>
        </html>

