<?php include 'config.php';

$id = $_GET['id'];
$slider = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM sliders WHERE id = $id"));

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];

    // تحقق من وجود صورة جديدة
    if ($_FILES['image']['name']) {
        $image_name = $_FILES['image']['name'];
        $target = "uploads/" . basename($image_name);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE sliders SET image='$image_name', title='$title', subtitle='$subtitle', button_text='$button_text', button_link='$button_link' WHERE id=$id";
    } else {
        $sql = "UPDATE sliders SET title='$title', subtitle='$subtitle', button_text='$button_text', button_link='$button_link' WHERE id=$id";
    }
echo "تم التعديل بنجاح. <a href='indexsliders.php'>العودة</a>";
    mysqli_query($con, $sql);
    echo "تم التعديل بنجاح. <a href='indexsliders.php'>العودة</a>";
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل سلايدر</title>
</head>
<body>
          <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                    

    <h2>تعديل سلايدر</h2>
    <a href="indexsliders.php"  class="add-button"> سلايدر </a>
   <form action="" method="POST" enctype="multipart/form-data" class="container mt-4" style="max-width: 800px;">
    <div class="row g-3">

        <div class="col-12 text-center">
            <img src="uploads/<?= $slider['image']; ?>" width="100" class="img-thumbnail mb-2">
        </div>

        <div class="col-md-6">
            <label class="form-label">تغيير الصورة:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">العنوان:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($slider['title']); ?>" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">الوصف:</label>
            <input type="text" name="subtitle" value="<?= htmlspecialchars($slider['subtitle']); ?>" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">نص الزر:</label>
            <input type="text" name="button_text" value="<?= htmlspecialchars($slider['button_text']); ?>" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">رابط الزر:</label>
            <input type="text" name="button_link" value="<?= htmlspecialchars($slider['button_link']); ?>" class="form-control">
        </div>

        <div class="col-12 text-center mt-3">
            <input type="submit" name="submit" value="حفظ التعديلات" class="btn btn-primary px-4">
        </div>

    </div>
</form>

 <?php include("footer.php"); ?>
