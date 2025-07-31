<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Sample counts
$resCount = $pdo->query('SELECT COUNT(*) FROM reservations')->fetchColumn();
$carCount = $pdo->query('SELECT COUNT(*) FROM cars')->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <h1>Dashboard</h1>
    <p>Bienvenue <?= htmlspecialchars($_SESSION['role']) ?></p>
    <p>Total réservations : <?= $resCount ?></p>
    <p>Total voitures : <?= $carCount ?></p>
    <a href="logout.php" class="btn btn-secondary">Déconnexion</a>
</body>
</html>
