<?php
include 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $icon_class = mysqli_real_escape_string($con, $_POST['icon_class']);
    $image = mysqli_real_escape_string($con, $_POST['image']);

    if ($name && $description && $icon_class && $image) {
        $sql = "INSERT INTO services (name, description, icon_class, image, details_url) VALUES ('$name', '$description', '$icon_class', '$image', '')";
        if (mysqli_query($con, $sql)) {
            $new_id = mysqli_insert_id($con);
            mysqli_query($con, "UPDATE services SET details_url='service_details.php?id=$new_id' WHERE id=$new_id");
            header("Location: services.php");
            exit;
        } else {
            $error = "خطأ في الإضافة: " . mysqli_error($con);
        }
    } else {
        $error = "جميع الحقول مطلوبة";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إضافة خدمة جديدة</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2 class="mb-4">إضافة خدمة جديدة</h2>

<?php if ($error): ?>
<div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<form method="post" action="" autocomplete="off">
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
        <label>رابط الصورة (مثال: img/a.jpg)</label>
        <input type="text" name="image" class="form-control" placeholder="img/a.jpg" required>
    </div>
    <button type="submit" class="btn btn-success">حفظ الخدمة</button>
    <a href="services.php" class="btn btn-secondary">رجوع</a>
</form>

</body>
</html>
