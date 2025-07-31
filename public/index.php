<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

$stmt = $pdo->query("SELECT cars.*, agencies.name AS agency, agencies.address, agencies.whatsapp FROM cars JOIN agencies ON cars.agency_id = agencies.id WHERE agencies.plan = 'premium'");
$cars = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voitures disponibles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <h1>Nos voitures</h1>
    <div class="row">
    <?php foreach ($cars as $car): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php if ($car['photo']): ?>
                <img src="../uploads/<?= htmlspecialchars($car['photo']) ?>" class="card-img-top" alt="photo">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($car['model']) ?></h5>
                    <p><?= htmlspecialchars($car['price_per_day']) ?> €/jour</p>
                    <p><?= htmlspecialchars($car['agency']) ?> - <?= htmlspecialchars($car['address']) ?></p>
                    <a href="https://wa.me/<?= htmlspecialchars($car['whatsapp']) ?>" class="btn btn-success" target="_blank">WhatsApp</a>
                    <a href="reserver.php?car=<?= $car['id'] ?>" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>
