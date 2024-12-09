<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">

    <title>Document</title>
</head>
<body>
    <header>        
      <nav class="nav">
        <div class="logo-container">
            <a href="index.html">
                <img src="imgs/DALLE_2024-12-09_09.02.44_-_A_minimalist_logo_featuring_a_simple_green_leaf_encased_in_a_blue_circle_symbolizing_environmental_protection_and_personal_environment._The_design_is-depositphotos-bgremover.png" 
                     alt="Logo" 
                     class="logo">
            </a>
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Energiafogyasztás kalkulátor</a></li>
            <li><a href="tippek.html">Tippek</a></li>
        </ul>
        <div class="login">
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
                // Show the logout link
                echo '<a href="bejelentkezes/kijelentkezes.php">Kijelentkezés</a>';
            } else {
                // Show the login link
                echo '<a href="bejelentkezes/bejelentkezes.php">Bejelentkezés</a>';
            }
            ?>
        </div>
    </nav>
    
    </header>

    <main class="about-page">
        <section class="about">
          <h1>Rólunk</h1>
          <h2>Kik vagyunk?</h2>
          <p>
            Az Eco Project elkötelezett csapata a fenntarthatóságért és a környezetvédelemért dolgozik. 
            Hiszünk abban, hogy minden apró lépés közelebb visz egy zöldebb jövőhöz. 
            Innovatív megoldásainkkal, közösségi programjainkkal és szemléletformáló kampányainkkal 
            a környezettudatosságot szeretnénk mindenki életének részévé tenni.
          </p>
        </section>
      
        <section class="join-us">
          <h2>Csatlakozz hozzánk!</h2>
          <p>
            Együtt tehetünk a Földért! Legyen szó önkéntességről, adományozásról vagy egyszerűen egy 
            zöld életmód választásáról – minden lépés számít. Látogass el eseményeinkre, kövess minket 
            a közösségi médiában, vagy iratkozz fel hírlevelünkre, hogy elsőként értesülj legújabb projektjeinkről.
          </p>
        </section>
      
        <section class="location">
          <h2>Hol találsz meg minket?</h2>
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1153.5589700103164!2d19.29856060007497!3d48.080626177988364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476aa100cd105fc1%3A0x5a4f00df058d4a94!2sN%C3%B3gr%C3%A1d%20Megyei%20SZC%20Szent-Gy%C3%B6rgyi%20Albert%20Technikum!5e0!3m2!1shu!2shu!4v1710502314493!5m2!1shu!2shu" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade" 
            class="map">
          </iframe>
        </section>
      </main>
      
    <footer>
        <div class="footer"></div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
