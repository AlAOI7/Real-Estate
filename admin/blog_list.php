<?php
include 'config.php';

$result = mysqli_query($con, "SELECT * FROM blog_articles ORDER BY id DESC");
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | About</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

    <?php include("header.php"); ?>
<div class="container">
    <h1 class="mb-4">المقالات</h1>
    <a href="blog_create.php" class="btn btn-success mb-3">إضافة مقال جديد</a>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>رقم</th>
                <th>العنوان</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" style="max-height:50px;"></td>
                <td>
                    <a href="blog_details.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">عرض</a>
                    <a href="blog_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">تعديل</a>
                    <a href="blog_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟');">حذف</a>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php if(mysqli_num_rows($result) == 0): ?>
            <tr><td colspan="4">لا توجد مقالات</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- /Main Wrapper -->
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
    </body>

</html>