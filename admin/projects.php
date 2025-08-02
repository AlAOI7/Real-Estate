<?php
include 'config.php';
$query = "SELECT p.*, c.name as category FROM projects p JOIN categories c ON c.id = p.category_id";
$result = mysqli_query($con, $query);
?>
<a href="project_add.php">+ إضافة مشروع</a>
<table border="1">
<tr>
    <th>ID</th><th>اسم المشروع</th><th>الفئة</th><th>الموقع</th><th>الخصائص</th><th>الوصف</th><th>تحكم</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['category'] ?></td>
    <td><?= $row['address'] ?></td>
    <td><?= $row['features'] ?></td>
    <td><?= mb_strimwidth($row['description'], 0, 50, '...') ?></td>
    <td>
        <a href="project_edit.php?id=<?= $row['id'] ?>">تعديل</a>
        <a href="project_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('تأكيد الحذف؟')">حذف</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
