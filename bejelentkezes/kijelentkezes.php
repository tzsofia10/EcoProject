<!-- kijelentkezes.php -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: ../index.html"); // Kijelentkezés után irányítsuk a főoldalra
exit();
?>
