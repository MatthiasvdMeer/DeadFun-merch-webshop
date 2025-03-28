<?php




?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheDeadTrio</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/yt logo.png" alt="Profielafbeelding">
            <span>TheDeadTrio</span>
        </div>
    </header>

    <main>
        <form>
            
        </form>
        <audio autoplay loop hidden>
            <source src="audios/funky town low quality.mp3" type="audio/mpeg">
        </audio>        
    </main>
      

    <footer>
        <p>click on the link below to find our yt channel</p>
        <p>⬇️⬇️⬇️⬇️⬇️⬇️</p>
        <a href="https://www.youtube.com/channel/UCI-TIix794D0ZnSfmMxVPLQ">TheDeadTrio</a>
    </footer>

</body>
</html>



<style>
    /* Algemene stijlen */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: darkblue;
    background-image: url(images/yt\ logo.png);
}

/* Header */
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

footer {
    display: flex;
    flex-direction: column; /* Stapel items verticaal */
    justify-content: center; /* Centreer verticaal */
    align-items: center; /* Centreer horizontaal */
    background-color: #A8B2FF;
    text-align: center;
}

</style>