<?php
include 'config.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("مقال غير صالح");
}

$result = mysqli_query($con, "SELECT * FROM blog_articles WHERE id=$id LIMIT 1");
$article = mysqli_fetch_assoc($result);
if (!$article) {
    die("المقال غير موجود");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short_details = mysqli_real_escape_string($con, $_POST['short_details']);
    $full_details = mysqli_real_escape_string($con, $_POST['full_details']);

    // تحقق من وجود صورة جديدة
    if ($_FILES['image']['name']) {
        // حذف الصورة القديمة إن وجدت
        if (!empty($article['image']) && file_exists('uploads/' . $article['image'])) {
            unlink('uploads/' . $article['image']);
        }

        // رفع الصورة الجديدة
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target = "uploads/" . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql = "UPDATE blog_articles SET 
            title='$title', 
            short_details='$short_details', 
            full_details='$full_details', 
            image='$image_name' 
            WHERE id=$id";
    } else {
        $sql = "UPDATE blog_articles SET 
            title='$title', 
            short_details='$short_details', 
            full_details='$full_details' 
            WHERE id=$id";
    }

    if (mysqli_query($con, $sql)) {
        echo "تم التعديل بنجاح. <a href='blog_list.php'>العودة</a>";
    } else {
        echo "حدث خطأ: " . mysqli_error($con);
    }
}
?>





    <?php include("header.php"); ?>
   <div class="page-wrapper">
                <div class="content container-fluid">


<div class="container" style="max-width: 700px;">
    <h1 class="mb-4">تعديل المقال</h1>

    <!-- <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?> -->

    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">عنوان المقال</label>
            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($article['title']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">تفاصيل مختصرة</label>
            <textarea name="short_details" rows="3" class="form-control" required><?php echo htmlspecialchars($article['short_details']); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">التفاصيل الكاملة</label>
            <textarea name="full_details" rows="6" class="form-control" required><?php echo htmlspecialchars($article['full_details']); ?></textarea>
        </div>
      <div class="mb-3">
        <label class="form-label">صورة المقال الحالية</label><br>
        <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" style="width: 150px; margin-bottom: 10px;">
    </div>
    <div class="mb-3">
        <label class="form-label">تغيير الصورة (اختياري)</label>
        <input type="file" name="image" class="form-control">
    </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="blog_list.php" class="btn btn-secondary ms-2">إلغاء</a>
    </form>
</div>
                </div>
   </div>
 <?php include("footer.php"); ?>