<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة سلايدر</title>
</head>
<body>
    <h2>إضافة سلايدر جديد</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>الصورة:</label><input type="file" name="image"><br>
        <label>العنوان:</label><input type="text" name="title"><br>
        <label>الوصف:</label><input type="text" name="subtitle"><br>
        <label>نص الزر:</label><input type="text" name="button_text"><br>
        <label>رابط الزر:</label><input type="text" name="button_link"><br>
        <input type="submit" name="submit" value="حفظ">
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
</body>
</html>
