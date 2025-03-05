<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Bienvenue, <?php echo $_SESSION["username"]; ?> !</h1>
    <a href="logout.php">Déconnexion</a>
</body>
</html>

