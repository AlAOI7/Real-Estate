<?php
include 'config.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("مقال غير صالح");
}

$sql = "DELETE FROM blog_articles WHERE id=$id LIMIT 1";

if (mysqli_query($con, $sql)) {
    header("Location: blog_list.php");
    exit;
} else {
    die("خطأ أثناء الحذف: " . mysqli_error($con));
}
?>
