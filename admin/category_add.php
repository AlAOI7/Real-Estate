<?php
include 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $class = trim($_POST['class_name']);

    if (empty($name) || empty($class)) {
        $error = "يرجى ملء جميع الحقول النصية.";
    } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $error = "يرجى رفع صورة صحيحة.";
    } else {
        // تجهيز رفع الصورة
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // اسم ملف جديد لتجنب التكرار
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target = $uploadDir . $image_name;

        // رفع الملف
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // إدخال البيانات في قاعدة البيانات
            $name_safe = mysqli_real_escape_string($con, $name);
            $class_safe = mysqli_real_escape_string($con, $class);
            $image_safe = mysqli_real_escape_string($con, $target);

            $sql = "INSERT INTO categories (name, class_name, image) VALUES ('$name_safe', '$class_safe', '$image_safe')";
            if (mysqli_query($con, $sql)) {
                header('Location: categories.php');
                exit;
            } else {
                $error = "خطأ في حفظ البيانات: " . mysqli_error($con);
            }
        } else {
            $error = "فشل في رفع الصورة.";
        }
    }
}
?>

<?php include("header.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <h1>اضافة فئات</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="form-container">
            <form method="POST" enctype="multipart/form-data">
                <label for="name">الاسم:</label>
                <input type="text" name="name" id="name" required>

                <label for="class_name">كلاس:</label>
                <input type="text" name="class_name" id="class_name" required>

                <label for="image">صورة:</label>
                <input type="file" name="image" id="image" accept="image/*" required>

                <button type="submit">حفظ</button>
                            <a href="categories.php" class="btn btn-secondary ms-2">إلغاء</a>

            </form>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>
