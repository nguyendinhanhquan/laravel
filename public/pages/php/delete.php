<?php
include '../../functions/functions.php';
$pdo = pdo_connect_mysql();

$id = $_GET['id']; 
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM dayoff_tbl WHERE ID = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        echo('Error');
        die;
    }

    $stmt = $pdo->prepare('DELETE FROM dayoff_tbl WHERE ID = ?');
    $stmt->execute([$_GET['id']]);
    header('Location: data.php');
}
?>