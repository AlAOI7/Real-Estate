<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($con, "DELETE FROM categories WHERE id=$id");
header('Location: categories.php');
exit;
