<?php
include 'config.php';
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM categories WHERE id=$id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $class = $_POST['class_name'];
    $image = $row['image'];
    if (!empty($_FILES['image']['name'])) {
        $image = 'img/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }
    mysqli_query($con, "UPDATE categories SET name='$name', class_name='$class', image='$image' WHERE id=$id");
    header('Location: categories.php');
    exit;
}
?>
<form method="POST" enctype="multipart/form-data">
    الاسم: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    كلاس: <input type="text" name="class_name" value="<?= $row['class_name'] ?>"><br>
    صورة: <input type="file" name="image"><br>
    <img src="<?= $row['image'] ?>" width="50"><br>
    <button type="submit">تعديل</button>
</form>
