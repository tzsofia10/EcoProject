<?php
// Hibajelentés bekapcsolása
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Csatlakozás az adatbázishoz
require "../connect.php"; // Feltételezzük, hogy itt van a csatlakozási beállítás

// Kapcsolati hiba ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// SQL lekérdezés
$sql = "SELECT e.date, e.consumed_quantity, u.name AS username
        FROM energy_consumption e
        JOIN users u ON e.user_id = u.id";

// Lekérdezés végrehajtása
$result = $conn->query($sql);

// Ellenőrizzük, hogy van-e eredmény
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lista.css">
    <title>Energiafogyasztási adatok</title>
</head>
<body>
    <h1>Energiafogyasztási adatok listája</h1>
    <button> <a href="felvitel.php">Új energiafogyasztás felvitele</a></button>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            // Táblázat kiírása, ha van adat
            echo "<table>";
            echo "<tr><th>Dátum</th><th>Fogyasztott mennyiség</th><th>Felhasználónév</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['date']) . "</td>
                        <td class='vmi'>" . htmlspecialchars($row['consumed_quantity']) . "</td>
                        <td>" . htmlspecialchars($row['username']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Jelenleg nincsenek elérhető energiafogyasztási adatok.</p>";
        }

        // Kapcsolat bezárása
        $conn->close();
        ?>
    </div>
</body>
</html>