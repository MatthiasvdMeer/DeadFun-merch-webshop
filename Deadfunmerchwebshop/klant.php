<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheDeadTrio</title>
    <link rel="stylesheet" href="webshop.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/yt_logo.png" alt="Profielafbeelding">
            <span>TheDeadTrio</span>
            <a href="index.php"><button class="header-button">Home</button></a>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="overlay">
            <?php
                include_once 'Functions-Klanten.php';
                CrudKlanten();  
            ?>
  

            </div>
        </section>
    </main>
    <div class="spotify-container">
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4LDmgup1WapxhhO4O7C03V?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
    </div>

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
        background-image: url('img/yt logo.png');
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
    .logo .header-button {
        padding: 10px 20px;
        font-size: 1rem;
        border: none;
        background-color: #1F2A60;
        color: white;
        border-radius: 8px;
        cursor: pointer;
    }

.logo .header-button:hover {
        background-color: #3243A0;
    }

    /* Hero sectie */
    .hero {
        position: relative;
        width: 100%;
        height: calc(100vh - 100px); /* Houdt rekening met header en footer */
        background: url('images/yt_logo.png') center/cover no-repeat;
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

    .overlay button img {
        width: 20px;
        height: 20px;
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