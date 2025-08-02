<?php
include 'config.php';
$result = mysqli_query($con, "SELECT * FROM categories");
?>
<a href="category_add.php">+ إضافة فئة</a>
<table border="1">
<tr>
    <th>ID</th><th>الاسم</th><th>كلاس CSS</th><th>صورة</th><th>تحكم</th>
</tr>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['class_name']) ?></td>
    <td><img src="<?= $row['image'] ?>" width="50"></td>
    <td>
        <a href="category_edit.php?id=<?= $row['id'] ?>">تعديل</a>
        <a href="category_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('تأكيد الحذف؟')">حذف</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
