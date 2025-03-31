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
             <img src="img/yt logo.png" alt="Profielafbeelding">
             <span>TheDeadTrio</span>
         </div>
     </header>
 
 
 
     <main>
         <section class="hero">
         
             <div class="overlay">
             <?php
             include 'functionsproduct.php';

             Crudmain();
             ?>
         <audio id="background-audio" autoplay loop hidden>
             <source src="audios/funky town low quality.mp3" type="audio/mpeg">
         </audio>
         <button onclick="toggleAudio()">on/off</button>
         <script>
        function toggleAudio() {
            var audio = document.getElementById('background-audio');
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        }

        function muteAudio() {
            var audio = document.getElementById('background-audio');
            audio.muted = !audio.muted;
        }
    </script>
             </div>
         </section>
     </main>
 
 
 
 
 
     <footer>
         <p>click on the link below to find our yt channel</p>
         <p>⬇️⬇️⬇️⬇️⬇️⬇️</p>
         <a href="https://www.youtube.com/channel/UCI-TIix794D0ZnSfmMxVPLQ">TheDeadTrio</a>
     </footer>
 
     <script src="webshop.js"></script>
 </body>
 </html>

<style>

  
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: darkblue;
    background-image: url('img/yt logo.png');
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
    height: calc(100vh - 100px); / Houdt rekening met header en footer */
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


</style>



