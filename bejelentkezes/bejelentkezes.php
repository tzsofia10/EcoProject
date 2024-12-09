<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.html"); // Redirect to the homepage if already logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "kornyezettudatos";

    $conn = new mysqli($servername, $username, $password_db, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);  // 's' indicates the type (string) of the parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['name'];
            session_regenerate_id(true);  // Regenerate session ID to prevent session fixation
            header("Location: index.html");
            exit();
        } else {
            echo "Hiba történt a bejelentkezés során";  // Generic error message
        }
    } else {
        echo "Hiba történt a bejelentkezés során";  // Generic error message
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="../css/pic.css">
</head>
<body>

    <div class="login-container">
        <h2>Bejelentkezés</h2>
        <form action="bejelentkezes.php" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Jelszó:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Bejelentkezés</button>
        </form>
    </div>

</body>
</html>
