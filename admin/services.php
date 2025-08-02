<?php
include 'config.php';

// حذف خدمة
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    mysqli_query($con, "DELETE FROM services WHERE id = $delete_id");
    header("Location: services.php");
    exit;
}

$result = mysqli_query($con, "SELECT * FROM services ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إدارة الخدمات</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2 class="mb-4">قائمة الخدمات</h2>

<a href="service_create.php" class="btn btn-success mb-3">إضافة خدمة جديدة</a>

<table class="table table-bordered table-striped text-center">
    <thead>
        <tr>
            <th>رقم</th>
            <th>اسم الخدمة</th>
            <th>الأيقونة</th>
            <th>الصورة</th>
            <th>الوصف</th>
            <th>التحكم</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><i class="fa <?php echo htmlspecialchars($row['icon_class']); ?>"></i></td>
                <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" style="max-height:50px;"></td>
                <td><?php echo htmlspecialchars(mb_strimwidth($row['description'], 0, 50, '...')); ?></td>
                <td>
                    <a href="service_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">تعديل</a>
                    <!-- <a href="services.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذه الخدمة؟');">حذف</a> -->
           <a href="service_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('هل أنت متأكد من حذف هذه الخدمة؟');" class="btn btn-danger btn-sm">حذف</a>

                </td>
            </tr>
        <?php endwhile;
        else: ?>
            <tr><td colspan="6">لا توجد خدمات</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
