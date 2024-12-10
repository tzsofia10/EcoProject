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
      <?php include 'html/navbar.php'; ?>
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
    <div class="footer-top">
  <div class="contact-info">
    <h3>Eco Project</h3>
    <p>Cím: Balassagyarmat, Rákóczi fejedelem út 50, 2660.</p>
    <p>Telefon: +36 1 234 5678</p>
    <p>Email: info@ecoproject.hu</p>
  </div>
  <div class="newsletter">
    <h4>Iratkozz fel!</h4>
    <form action="/subscribe" method="POST">
      <input type="email" name="email" placeholder="Email címed">
      <button type="submit">Feliratkozás</button>
    </form>
  </div>
</div>
<div class="footer-bottom">
  <p>© 2024 Eco Project.</p>
  <div class="social-icons">
    <a href="https://facebook.com/ecoproject"><i class="fa fa-facebook"></i></a>
    <a href="https://instagram.com/ecoproject"><i class="fa fa-instagram"></i></a>
  </div>
</div>

    </footer>

</body>
</html>
