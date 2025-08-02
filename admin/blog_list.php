<?php
include 'config.php';

$result = mysqli_query($con, "SELECT * FROM blog_articles ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <title>قائمة المقالات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="p-4">

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

</body>
</html>
