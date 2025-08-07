<?php
include 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short_details = mysqli_real_escape_string($con, $_POST['short_details']);
    $full_details = mysqli_real_escape_string($con, $_POST['full_details']);

    // التحقق من رفع الصورة
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $target = "uploads/" . basename($image_name);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // إدخال البيانات
            $sql = "INSERT INTO blog_articles (title, short_details, full_details, image) 
                    VALUES ('$title', '$short_details', '$full_details', '$image_name')";

            if (mysqli_query($con, $sql)) {
                header("Location: blog_list.php");
                exit;
            } else {
                $error = "حدث خطأ أثناء الإضافة: " . mysqli_error($con);
            }
        } else {
            $error = "فشل في رفع الصورة.";
        }
    } else {
        $error = "الرجاء اختيار صورة للمقال.";
    }
}
?>


<?php include("header.php"); ?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="container" style="max-width: 700px;">
            <h1 class="mb-4">إضافة مقال جديد</h1>

            <?php if($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">عنوان المقال</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">تفاصيل مختصرة</label>
                    <textarea name="short_details" rows="3" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">التفاصيل الكاملة</label>
                    <textarea name="full_details" rows="6" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">صورة المقال</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">حفظ</button>
                <a href="blog_list.php" class="btn btn-secondary ms-2">إلغاء</a>
            </form>
        </div>

    </div>
</div>
<?php include("footer.php"); ?>


