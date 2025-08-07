<?php
include 'config.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("تصنيف غير صالح");
}

// جلب بيانات التصنيف القديم
$result = mysqli_query($con, "SELECT * FROM categories WHERE id=$id LIMIT 1");
$row = mysqli_fetch_assoc($result);
if (!$row) {
    die("التصنيف غير موجود");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $class = mysqli_real_escape_string($con, $_POST['class_name']);
    $image = $row['image']; // افتراضي الصورة القديمة

    // تحقق من رفع صورة جديدة
        if (!empty($_FILES['image']['name'])) {
            // حذف الصورة القديمة إن وجدت (اختياري)
            if (!empty($row['image']) && file_exists('uploads/' . $row['image'])) {
                unlink('uploads/' . $row['image']);
            }

            // حفظ الصورة الجديدة
            $image_name = time() . '_' . basename($_FILES['image']['name']);
            $target = "uploads/" . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $image = $image_name; // ✅ فقط اسم الصورة، بدون المسار
            } else {
                echo "فشل رفع الصورة الجديدة.";
                exit;
            }
        }


    // تحديث البيانات في القاعدة
    $sql = "UPDATE categories SET name='$name', class_name='$class', image='$image' WHERE id=$id";
    if (mysqli_query($con, $sql)) {
        header('Location: categories.php');
        exit;
    } else {
        echo "خطأ في التحديث: " . mysqli_error($con);
    }
}
?>


  <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
<h1>تعديل فئات</h1>
<div class="form-container">
<form method="post" enctype="multipart/form-data">
    <label>اسم التصنيف:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
    
    <label>اسم الكلاس:</label>
    <input type="text" name="class_name" value="<?php echo htmlspecialchars($row['class_name']); ?>" required>

    <label>الصورة الحالية:</label><br>
    <?php if (!empty($row['image'])): ?>
        <img src="<?php echo htmlspecialchars($row['image']); ?>" width="100" alt="صورة التصنيف"><br>
    <?php endif; ?>

    <label>تغيير الصورة (اختياري):</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">تحديث التصنيف</button>
            <a href="categories.php" class="btn btn-secondary ms-2">إلغاء</a>

</form>


</div>
                </div>

                
  <?php include("footer.php"); ?>