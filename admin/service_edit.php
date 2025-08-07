<?php
include 'config.php';

$id = $_GET['id'];
$service = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM services WHERE id = $id"));

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $icon_class = $_POST['icon_class'];

    // التحقق من وجود صورة جديدة
    if ($_FILES['image']['name']) {
        // حذف الصورة القديمة إن وجدت
        if (!empty($service['image']) && file_exists('uploads/' . $service['image'])) {
            unlink('uploads/' . $service['image']);
        }

        // رفع الصورة الجديدة
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target = "uploads/" . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql = "UPDATE services SET 
            name='$name', 
            description='$description', 
            icon_class='$icon_class', 
            image='$image_name' 
            WHERE id=$id";
    } else {
        $sql = "UPDATE services SET 
            name='$name', 
            description='$description', 
            icon_class='$icon_class' 
            WHERE id=$id";
    }

 
    echo "تم التعديل بنجاح. <a href='services.php'>العودة</a>";
    mysqli_query($con, $sql);
    echo "تم التعديل بنجاح. <a href='services.php'>العودة</a>";

}
?>

<?php include("header.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <h2 class="mb-4">تعديل الخدمة</h2>

        <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
            <div class="mb-3">
                <label>اسم الخدمة</label>
                <input type="text" name="name" class="form-control" 
                    value="<?php echo htmlspecialchars($service['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label>الوصف</label>
                <textarea name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($service['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label>أيقونة FontAwesome</label>
                <input type="text" name="icon_class" class="form-control" 
                    value="<?php echo htmlspecialchars($service['icon_class']); ?>" required>
            </div>

            <div class="mb-3 text-center">
                <label>الصورة الحالية:</label><br>
                <img src="uploads/<?php echo htmlspecialchars($service['image']); ?>" width="120" class="img-thumbnail mb-2">
            </div>

            <div class="mb-3">
                <label class="form-label">تغيير الصورة:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">تحديث الخدمة</button>
            <a href="services.php" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>

<?php include("footer.php"); ?>
