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
    <h2>تعديل سلايدر</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <img src="uploads/<?= $slider['image']; ?>" width="100"><br>
        <label>تغيير الصورة:</label><input type="file" name="image"><br>
        <label>العنوان:</label><input type="text" name="title" value="<?= $slider['title']; ?>"><br>
        <label>الوصف:</label><input type="text" name="subtitle" value="<?= $slider['subtitle']; ?>"><br>
        <label>نص الزر:</label><input type="text" name="button_text" value="<?= $slider['button_text']; ?>"><br>
        <label>رابط الزر:</label><input type="text" name="button_link" value="<?= $slider['button_link']; ?>"><br>
        <input type="submit" name="submit" value="حفظ التعديلات">
    </form>
</body>
</html>
