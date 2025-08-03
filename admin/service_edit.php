<?php
include 'config.php';

$id = intval($_GET['id'] ?? 0);
$result = mysqli_query($con, "SELECT * FROM services WHERE id = $id");
if (mysqli_num_rows($result) == 0) {
    die("الخدمة غير موجودة");
}
$service = mysqli_fetch_assoc($result);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $icon_class = mysqli_real_escape_string($con, $_POST['icon_class']);
    $image = mysqli_real_escape_string($con, $_POST['image']);

    if ($name && $description && $icon_class && $image) {
        $sql = "UPDATE services SET 
                name='$name', 
                description='$description', 
                icon_class='$icon_class', 
                image='$image' 
                WHERE id=$id";

        if (mysqli_query($con, $sql)) {
            header("Location: services.php");
            exit;
        } else {
            $error = "خطأ في التحديث: " . mysqli_error($con);
        }
    } else {
        $error = "جميع الحقول مطلوبة";
    }
}
?>
  <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">



<h2 class="mb-4">تعديل الخدمة</h2>

<?php if ($error): ?>
<div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<form method="post" action="" autocomplete="off">
    <div class="mb-3">
        <label>اسم الخدمة</label>
        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($service['name']); ?>" required>
    </div>
    <div class="mb-3">
        <label>الوصف</label>
        <textarea name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($service['description']); ?></textarea>
    </div>
    <div class="mb-3">
        <label>أيقونة FontAwesome</label>
        <input type="text" name="icon_class" class="form-control" value="<?php echo htmlspecialchars($service['icon_class']); ?>" required>
    </div>
    <div class="mb-3">
        <label>رابط الصورة</label>
        <input type="text" name="image" class="form-control" value="<?php echo htmlspecialchars($service['image']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">تحديث الخدمة</button>
    <a href="services.php" class="btn btn-secondary">رجوع</a>
</form>

                </div></div>
  <?php include("footer.php"); ?>

