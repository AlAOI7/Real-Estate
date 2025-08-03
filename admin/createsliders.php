
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة سلايدر</title>
</head>
   <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                    

    <h2>إضافة سلايدر جديد</h2>
 <a href="indexsliders.php"  class="add-button"> سلايدر </a>
<form method="POST" enctype="multipart/form-data" class="container mt-4" style="max-width: 700px;">
    <h3 class="mb-4 text-center">إضافة عنصر جديد</h3>
    <div class="row g-3">

        <div class="col-md-6">
            <label for="image" class="form-label">الصورة:</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="title" class="form-label">العنوان:</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="subtitle" class="form-label">الوصف:</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="button_text" class="form-label">نص الزر:</label>
            <input type="text" id="button_text" name="button_text" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="button_link" class="form-label">رابط الزر:</label>
            <input type="text" id="button_link" name="button_link" class="form-control">
        </div>

        <div class="col-12 text-center mt-3">
            <input type="submit" name="submit" value="حفظ" class="btn btn-primary px-5">
        </div>
    </div>
</form>


    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $button_text = $_POST['button_text'];
        $button_link = $_POST['button_link'];
        $image_name = $_FILES['image']['name'];
        $target = "uploads/" . basename($image_name);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "INSERT INTO sliders (image, title, subtitle, button_text, button_link) VALUES ('$image_name', '$title', '$subtitle', '$button_text', '$button_link')";
            mysqli_query($con, $sql);
            echo "تمت الإضافة بنجاح. <a href='indexsliders.php'>العودة للقائمة</a>";
        } else {
            echo "فشل رفع الصورة.";
        }
    }
    ?>
                </div>
     </div>
  <?php include("footer.php"); ?>
