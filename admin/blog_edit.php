<?php
include 'config.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("مقال غير صالح");
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short_details = mysqli_real_escape_string($con, $_POST['short_details']);
    $full_details = mysqli_real_escape_string($con, $_POST['full_details']);
    $image = mysqli_real_escape_string($con, $_POST['image']);

    if (!$title || !$short_details || !$full_details || !$image) {
        $error = "جميع الحقول مطلوبة";
    } else {
        $sql = "UPDATE blog_articles SET title='$title', short_details='$short_details', full_details='$full_details', image='$image' WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            header("Location: blog_list.php");
            exit;
        } else {
            $error = "حدث خطأ أثناء التحديث: " . mysqli_error($con);
        }
    }
} else {
    $result = mysqli_query($con, "SELECT * FROM blog_articles WHERE id=$id LIMIT 1");
    $article = mysqli_fetch_assoc($result);
    if (!$article) {
        die("المقال غير موجود");
    }
}
?>




    <?php include("header.php"); ?>
   <div class="page-wrapper">
                <div class="content container-fluid">


<div class="container" style="max-width: 700px;">
    <h1 class="mb-4">تعديل المقال</h1>

    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="">
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
            <label class="form-label">رابط صورة المقال</label>
            <input type="text" name="image" class="form-control" value="<?php echo htmlspecialchars($article['image']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="blog_list.php" class="btn btn-secondary ms-2">إلغاء</a>
    </form>
</div>
                </div>
   </div>
 <?php include("footer.php"); ?>