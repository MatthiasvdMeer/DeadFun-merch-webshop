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
             include_once 'functionsproduct.php';

             Crudmain();
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
         <a href="https://www.youtube.com/channel/UCI-TIix794D0ZnSfmMxVPLQ"><button class="header-button">TheDeadTrio</button></a>
     </footer>
 
     <script src="webshop.js"></script>
 </body>
 </html>

 <style>
/* Algemene stijl */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: rgb(34, 34, 34);
    background-image: url('images/yt_logo.png');
    background-repeat: no-repeat; /* Achtergrondafbeelding slechts één keer tonen */
    background-position: center ; /* Plaats de afbeelding bovenaan gecentreerd */
    background-size: contain; /* Zorg ervoor dat de afbeelding volledig zichtbaar is */
    height: auto; /* Zorg ervoor dat de pagina altijd de volledige hoogte heeft */
    
    
}

/* Header */
header {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        background-color: #A8B2FF;
    }
a{
    text-decoration: none;
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

.header-button {
        padding: 10px 20px;
        font-size: 1rem;
        border: none;
        background-color: #1F2A60;
        color: white;
        border-radius: 8px;
        cursor: pointer;
    }

.header-button:hover {
        background-color: #3243A0;
    }
    /* Hero sectie */
.hero {
        position: relative;
        width: 98,9%;
        height: auto;
        margin: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
/* Footer */
footer {
    position: flex; /* Zorg ervoor dat de footer altijd onderaan blijft */
    bottom: 0;
    left: 0;
    width: 98,9%;
    background-color: #A8B2FF;
    text-align: center;
    padding: 10px;
    z-index: 1000; /* Zorg ervoor dat de footer boven de inhoud blijft */
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

<div class="table-container">
    
        <tbody>
            <?php
            

            function getAllRecords() {
                // Example implementation of getAllRecords
                // Replace this with the actual database query logic
                return [
                    [
                        'prodID' => 1,
                        'prodNaam' => 'Product A',
                        'prijs' => 10.99,
                        'Foto' => '', // Base64 encoded image data
                        'leverancierID' => 101
                    ],
                    [
                        'prodID' => 2,
                        'prodNaam' => 'Product B',
                        'prijs' => 15.49,
                        'Foto' => '', // Base64 encoded image data
                        'leverancierID' => 102
                    ]
                ];
            }

        ?>
        </tbody>
    </table>
</div>



