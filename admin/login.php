<?php
session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && hash("sha256", $password) === $admin["password_hash"]) {
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Identifiants incorrects !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion Admin</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <label>Nom d'utilisateur :</label>
            <input type="text" name="username" required>
            <label>Mot de passe :</label>
            <input type="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>

