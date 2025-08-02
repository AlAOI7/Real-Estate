<?php
include 'config.php';

$id = 0;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} elseif (isset($_POST['id'])) {
    $id = intval($_POST['id']);
}

if ($id > 0) {
    mysqli_query($con, "DELETE FROM services WHERE id = $id");
}

header("Location: services.php");
exit;
