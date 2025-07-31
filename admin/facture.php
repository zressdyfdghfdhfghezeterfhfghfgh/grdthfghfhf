<?php
require_once '../includes/functions.php';
require_once '../includes/db.php';

if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Facture exemple</h1><p>Contenu de la facture...</p>');
$mpdf->Output('facture.pdf','I');
