<?php
session_start();
session_unset(); // Minden session változó törlése
session_destroy(); // A session lezárása

header("Location: ../index.php"); // Átirányítás az index.php-ra
exit();
?>
