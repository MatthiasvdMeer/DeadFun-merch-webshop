<?php

    require_once ('functions.php');

    //test of er op de knop is gedrukt
    if(isset($_POST['btn_ins'])){

            Insertleverancier($_POST);
            echo '<script>alert("leveranciernaam: ' . $_POST['naam'] . ' is toegevoegd")</script>';


    }

?>
<html>
<body>
        <h1>Insert insert leverancier Info</h1>
    <h2>This is the place where you can make your own leverancier stuff</h2>

    <form method="post">

<br>

        <label for="naam">Naam:</label>
        <br>
        <input type="text" id="naam" name="naam" required>
<br>

        <label for="soort">Soort:</label>
        <br>
        <input type="text" id="soort" name="soort" required>
<br>

        <label for="alcohol">Alcohol:</label>
        <br>
        <input type="number" id="alcohol" name="alcohol" step="0.1" required>
<br>

        <button type="submit" name="btn_ins"">Create NOW!!!</button>
    </form>
    <form action="crud_leverancieren.php"><button type="submit">HOME</button></form>
</body>
</html>

