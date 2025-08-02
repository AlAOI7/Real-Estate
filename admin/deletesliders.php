<?php
include 'config.php';
$id = $_GET['id'];

// حذف الصورة من المجلد
$result = mysqli_query($con, "SELECT image FROM sliders WHERE id = $id");
$row = mysqli_fetch_assoc($result);
if (file_exists("uploads/" . $row['image'])) {
    unlink("uploads/" . $row['image']);
}

mysqli_query($con, "DELETE FROM sliders WHERE id = $id");
header("Location: indexsliders.php");
exit;
?>
