<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_SESSION['uid'])) {
    $order_id = intval($_POST['order_id']);
    $user_id  = intval($_SESSION['uid']);

    // الحذف الناعم
    $query = "UPDATE orders SET deleted = 1 WHERE id = '$order_id' AND user_id = '$user_id'";
    mysqli_query($con, $query);
}

header("Location: my_orders.php");
exit();
