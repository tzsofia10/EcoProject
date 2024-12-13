<nav class="nav">
    <div class="logo-container">
        <a href="index.php" >
            <img class="logo" src="./imgs/DALLE_2024-12-09_09.02.44_-_A_minimalist_logo_featuring_a_simple_green_leaf_encased_in_a_blue_circle_symbolizing_environmental_protection_and_personal_environment._The_design_is-depositphotos-bgremover.png">
        </a>
    </div>
    <ul>
        <li><a href="./home.php">Home</a></li>
        <li><a href="./admin/felvitel.php">Energiafogyasztás kalkulátor</a></li>
        <li><a href="./elerhetoseg.php">Elérhetőségek</a></li>
        <li><a href="./jatek/jatek.php">Játék</a></li>
    </ul>
    <div class="login">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            // Ha be van jelentkezve, akkor kijelentkezés linket mutatunk
            echo '<a href="./bejelentkezes/kijelentkezes.php">Kijelentkezés</a>';
        } else {
            // Ha nincs bejelentkezve, akkor bejelentkezés linket mutatunk
            echo '<a href="./bejelentkezes/bejelentkezes.php">Bejelentkezés</a>';
        }
        ?>
    </div>
</nav>
