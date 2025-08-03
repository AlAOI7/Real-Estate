<?php
include 'config.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: reviewsindex.php");
exit;
?>
