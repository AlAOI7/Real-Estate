<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // حذف الصور أولًا
    $images = mysqli_query($con, "SELECT * FROM project_images WHERE project_id = $id");
    while ($img = mysqli_fetch_assoc($images)) {
        if (file_exists($img['image_path'])) {
            unlink($img['image_path']);
        }
    }
    mysqli_query($con, "DELETE FROM project_images WHERE project_id = $id");

    // حذف المشروع
    mysqli_query($con, "DELETE FROM projects WHERE id = $id");

    header("Location: projects.php");
    exit;
}
?>
