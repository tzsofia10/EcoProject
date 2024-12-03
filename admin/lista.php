<?php
// Csatlakozás az adatbázishoz
require "../connect.php"; // Feltételezzük, hogy itt van a csatlakozási beállítás

// SQL lekérdezés
$sql = "SELECT e.date, e.consumed_quantity, u.name AS username
        FROM energy_consumption e
        JOIN users u ON e.user_id = u.id";

// Lekérdezés végrehajtása
$result = $conn->query($sql);

// Ellenőrizzük, hogy van-e eredmény
if ($result->num_rows > 0) {
    // Eredmények kiírása
    echo "<table>";
    echo "<tr><th>Date</th><th>Consumed Quantity</th><th>Username</th></tr>";

    // Minden egyes sor kiírása
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['date'] . "</td>
                <td>" . $row['consumed_quantity'] . "</td>
                <td>" . $row['username'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nincs megjeleníthető adat.";
}

// Kapcsolat bezárása
$conn->close();
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stilus.css">
    <title>Energiafogyasztási adatok</title>
</head>
<body>
    <h1>Energiafogyasztási adatok listája</h1>
    <p><a href="felvitel.php">Új energiafogyasztás felvitele</a></p>
    <div class="container">
        <?php
        // Ha van adat a kimenet változóban, akkor jelenítse meg a táblázatot
        if (isset($kimenet)) {
            echo $kimenet;
        } else {
            echo "<p>Jelenleg nincsenek elérhető energiafogyasztási adatok.</p>";
        }
        ?>
    </div>
</body>
</html>

