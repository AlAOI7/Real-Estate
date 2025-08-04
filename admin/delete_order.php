<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $id = intval($_POST['order_id']);
    $query = "UPDATE orders SET deleted = 1 WHERE id = $id";
    mysqli_query($con, $query);
}

header("Location: orders.php");
exit();
