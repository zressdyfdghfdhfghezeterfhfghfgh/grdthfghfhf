<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

check_csrf();

$car_id = $_GET['car'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_id = $_POST['car_id'];
    $name = $_POST['name'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];

    $pdo->prepare('INSERT INTO reservations (car_id, client_id, start_date, end_date, status) VALUES (?, NULL, ?, ?, "en attente")')
        ->execute([$car_id, $start, $end]);

    echo "<p>Réservation enregistrée. Nous vous contacterons bientôt.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <h1>Réserver la voiture #<?= htmlspecialchars($car_id) ?></h1>
    <form method="post">
        <input type="hidden" name="token" value="<?= csrf_token() ?>">
        <input type="hidden" name="car_id" value="<?= htmlspecialchars($car_id) ?>">
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date début</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date fin</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</body>
</html>
