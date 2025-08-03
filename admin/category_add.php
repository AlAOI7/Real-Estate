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


  <?php include("header.php"); ?>

       <div class="page-wrapper">
                <div class="content container-fluid">




<h1>اضافة فئات</h1>
<div class="form-container">
    <form method="POST" >
        <label for="name">الاسم:</label>
        <input type="text" name="name" id="name">

        <label for="class_name">كلاس:</label>
        <input type="text" name="class_name" id="class_name">

        <label for="image">صورة:</label>
        <input type="file" name="image" id="image">

        <button type="submit">حفظ</button>
    </form>
</div>


                </div>
       </div>
         <?php include("footer.php"); ?>
