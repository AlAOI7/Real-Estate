<?php
include 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $icon_class  = mysqli_real_escape_string($con, $_POST['icon_class']);

    // معالجة الصورة
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp  = $_FILES['image']['tmp_name'];
        $target_dir = "uploads/";
        $target_path = $target_dir . basename($image_name);

        if (move_uploaded_file($image_tmp, $target_path)) {
            $sql = "INSERT INTO services (name, description, icon_class, image, details_url) 
                    VALUES ('$name', '$description', '$icon_class', '$image_name', '')";

            if (mysqli_query($con, $sql)) {
                $new_id = mysqli_insert_id($con);
                mysqli_query($con, "UPDATE services SET details_url='service_details.php?id=$new_id' WHERE id=$new_id");
                header("Location: services.php");
                exit;
            } else {
                $error = "خطأ في الإضافة: " . mysqli_error($con);
            }
        } else {
            $error = "فشل رفع الصورة. تأكد من صلاحيات مجلد uploads.";
        }
    } else {
        $error = "يرجى اختيار صورة صالحة.";
    }
}
?>

<?php include("header.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <h2 class="mb-4">إضافة خدمة جديدة</h2>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
            <div class="mb-3">
                <label>اسم الخدمة</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>الوصف</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label>أيقونة FontAwesome (مثال: fa-building)</label>
                <input type="text" name="icon_class" class="form-control" placeholder="fa-building" required>
            </div>
            <div class="mb-3">
                <label>اختيار صورة</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">حفظ الخدمة</button>
            <a href="services.php" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>

<?php include("footer.php"); ?>
