<nav class="nav">
    <div class="logo-container">
        <a href="index.html">
            <img src="../imgs/DALLE_2024-12-09_09.02.44_-_A_minimalist_logo_featuring_a_simple_green_leaf_encased_in_a_blue_circle_symbolizing_environmental_protection_and_personal_environment._The_design_is-depositphotos-bgremover.png" 
                 alt="Logo" 
                 class="logo">
        </a>
    </div>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Energiafogyasztás kalkulátor</a></li>
        <li><a href="../tippek.html">Tippek</a></li>
    </ul>
    <div class="login">
        <?php
        session_start();
        if (isset($_SESSION['user'])) {
            // Show the logout link
            echo '<a href="kijelentkezes.php">Kijelentkezés</a>';
        } else {
            // Show the login link
            echo '<a href="../bejelentkezes/bejelentkezes.php">Bejelentkezés</a>';
        }
        ?>
    </div>
</nav>
