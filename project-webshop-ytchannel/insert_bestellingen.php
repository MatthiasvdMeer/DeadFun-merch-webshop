<?php

    require_once ('functions.php');

    //test of er op de knop is gedrukt
    if(isset($_POST['btn_ins'])){

            Insertbestellingen($_POST);
            echo '<script>alert("bestellingID: ' . $_POST['bestellingID'] . ' is toegevoegd")</script>';


    }

?>
<html>
<body>

<header>
        <div class="logo">
            <img src="images/yt logo.png" alt="profielafbeelding">
            <span>TheDeadTrio</span>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="overlay">
       
        </section>
    </main>

    <div class="spotify-container">
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4LDmgup1WapxhhO4O7C03V?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </div>

        <h1>Insert order Info</h1>
    <h2>create here your own order</h2>

    <form method="post">

<br>

        <label for="bestellingID">OrderID:</label>
        <br>
        <input type="text" id="bestellingID" name="bestellingID" required>
<br>


        <label for="klantID">CustomerID:</label>
        <br>
        <input type="text" id="klantID" name="klantID" required>

<br>

        <label for="prodID">ProdID:</label>
        <br>
        <input type="text" id="prodID" name="prodID" required>

<br>

        <label for="datum">Date:</label>
        <br>
        <input type="date" id="datum" name="datum" step="0.1" required>


<br>

        <label for="aantal">Amount:</label>
        <br>
        <input type="text" id="aantal" name="aantal" required>

<br>

<label for="prijs">Price:</label><br>
<input type="number" id="prijs" name="prijs" required step="0.01" value="
<?php echo number_format($row['prijs'], 2, '.', ''); ?>"><br>

<br>

        <button type="submit" name="btn_ins">Create NOW!!!</button><br><br>
    </form>
    <form action="bestellingen.php">
        <button type="submit" name="home">home</button>
</form>

<footer>
        <p>click on the link below to find our yt channel</p>
        <p>⬇️⬇️⬇️⬇️⬇️⬇️</p>
        <a href="https://www.youtube.com/channel/UCI-TIix794D0ZnSfmMxVPLQ">TheDeadTrio</a>
    </footer>

</body>
</html>


<style>

body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: darkblue;
    background-image: url('images/yt logo.png');
}


header {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    background-color: #A8B2FF;
}

.logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.hero {
    position: relative;
    width: 100%;
    background: url('img/yt logo.png') center/cover no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
}

.overlay {
    background: rgba(255, 255, 255, 0.6); 
    padding: 10px;
    border-radius: 15px;
    text-align: center;
}

.overlay h1 {
    font-size: 2rem;
    color: #1F2A60;
}

.overlay button {
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    background-color: #1F2A60;
    color: white;
    border-radius: 8px;
    cursor: pointer;
}

.overlay button:hover {
    background-color: #3243A0;
}

footer {

    bottom: 0;
    left: 0;
    width: 98.98%;
    background-color: #A8B2FF;
    text-align: center;
    padding: 10px;
}

.spotify-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: 80px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }


</style>