<?php 
    // energy_consumption táblába tölti fel az adatokat
if (isset($_POST['rendben'])) {
    $date = htmlspecialchars(strip_tags($_POST['date']));
    $consumed_quantity = floatval($_POST['consumed_quantity']);
    $consumption_type = htmlspecialchars(strip_tags($_POST['consumption_type']));
    $waste_type = htmlspecialchars(strip_tags($_POST['waste_type']));
    $user_id = 1; 

    // Hibakezelés
    $hibak = [];

    if (empty($date)) {
        $hibak[] = "A dátum megadása kötelező!";
    }

    if ($consumed_quantity <= 0) {
        $hibak[] = "Az elfogyasztott mennyiségnek pozitív számnak kell lennie!";
    }

    if (empty($waste_type)) {
        $hibak[] = "A hulladéktípus kiválasztása kötelező!";
    }

    if (empty($consumption_type)) {
        $hibak[] = "A fogyasztás típusának megadása kötelező!";
    }

    if (empty($hibak)) {
        require "../connect.php";

        // Megfelelő SQL lekérdezés létrehozása az `energy_consumption` táblához
        $sql = "INSERT INTO energy_consumption (user_id, date, consumed_quantity) 
                VALUES ('$user_id', '$date', '$consumed_quantity')";

        if (mysqli_query($conn, $sql)) {
            $kimenet = "<p>Sikeresen mentve!</p>";
        } else {
            $kimenet = "<p>Hiba történt: " . mysqli_error($conn) . "</p>";
        }
    } else {
        $kimenet = "<ul>";
        foreach ($hibak as $hiba) {
            $kimenet .= "<li>" . $hiba . "</li>";
        }
        $kimenet .= "</ul>";
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/felvitel.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Új energiafogyasztás felvitele</title>
</head>
<body>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Hibák megjelenítése -->
            <?php if (isset($kimenet)) echo $kimenet; ?>
            
            <p><label for="date">Dátum:</label></p>
            <input type="datetime-local" name="date" id="date" required>
            
            <p><label for="consumed_quantity">Elfogyasztott mennyiség (kWh vagy kg):</label></p>
            <input type="number" name="consumed_quantity" min="0" id="consumed_quantity" step="0.01" required>
            
            <p><label for="consumption_type">Fogyasztás típusa:</label></p>
            <select name="consumption_type" id="consumption_type" required>
                <option value="aram">Áram</option>
                <option value="gaz">Gáz</option>
                <option value="viz">Víz</option>
            </select>
            
            <p><label for="waste_type">Hulladéktípus:</label></p>
            <select name="waste_type" id="waste_type" required>
                <option value="szerves">Szerves</option>
                <option value="muanyag">Műanyag</option>
                <option value="papir">Papír</option>
                <option value="uveg">Üveg</option>
                <option value="fem">Fém</option>
            </select>
            
            <input type="submit" value="Rendben" name="rendben" id="rendben">
            <input type="reset" value="Mégsem">
            <button> <a href="lista.php">Vissza a listához</a></button>
        </form>
    </div>    

</body>
</html>
