<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $class = $_POST['class_name'];
    $image = 'img/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
    mysqli_query($con, "INSERT INTO categories (name, class_name, image) VALUES ('$name', '$class', '$image')");
    header('Location: categories.php');
    exit;
}
?>
<form method="POST" enctype="multipart/form-data">
    الاسم: <input type="text" name="name"><br>
    كلاس: <input type="text" name="class_name"><br>
    صورة: <input type="file" name="image"><br>
    <button type="submit">حفظ</button>
</form>
