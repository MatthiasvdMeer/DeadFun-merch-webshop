<?php

    require_once('functions.php');
 
    if (isset($_POST['btn_wzg'])) {
      $updateResult = Updatebestellingen($_POST);
  
      if ($updateResult) {
          echo "<script>alert('Order has successfully changed');</script>";
      } else {
          echo "<script>alert('Order has not changed. It may have the same values as before.');</script>";
      }
  }  

    if(isset($_GET['bestellingID'])){  
        $bestellingID = $_GET['bestellingID'];
        $row = Getbestellingen($bestellingID);
    
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wbestellingIDth=device-wbestellingIDth, initial-scale=1.0">
  <title>Change Order</title>
</head>
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

  <h2>Change Order</h2>
  <form method="post">
    
    <label for="bestellingID">OrderID:</label>
    <input klantID="text" bestellingID="bestellingID" name="bestellingID" required value="<?php echo $row['bestellingID']; ?>"><br><br><br>

    <label for="klantID">CustomerID:</label>
    <input klantID="text" bestellingID="klantID" name="klantID" required value="<?php echo $row['klantID']; ?>"><br><br><br>

    <label for="prodID">prodID:</label>
    <input klantID="number" bestellingID="prodID" name="prodID" required value="<?php echo $row['prodID']; ?>"><br><br><br>

    <label for="datum">Date:</label>
    <input klantID="number" bestellingID="datum" name="datum" required value="<?php echo $row['datum']; ?>"><br><br><br>

    <label for="aantal">Amount:</label>
    <input klantID="number" bestellingID="aantal" name="aantal" required value="<?php echo $row['aantal']; ?>"><br><br><br>

    <label for="prijs">Price:</label>
    <input type="number" id="prijs" name="prijs" required step="0.01" value="<?php echo number_format($row['prijs'], 2, '.', ''); ?>"><br><br><br>

    <button klantID="submit" name="btn_wzg">Update NOW!!!</button>
  </form>
  <br><br>
  <a href='bestellingen.php'>Home</a>

  <footer>
        <p>click on the link below to find our yt channel</p>
        <p>⬇️⬇️⬇️⬇️⬇️⬇️</p>
        <a href="https://www.youtube.com/channel/UCI-TIix794D0ZnSfmMxVPLQ">TheDeadTrio</a>
    </footer>

</body>
</html>

<?php
    } else {
        echo "Geen bestellingID opgegeven<br>";
    }
?>


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