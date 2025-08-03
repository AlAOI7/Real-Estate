<?php
include 'config.php';
$result = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - التعليقات</title>
    <link rel="stylesheet" href="style.css"> <!-- يمكن ربط CSS حسب الحاجة -->
</head>
<body>
    <h2>التعليقات</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد</th>
                <th>التعليق</th>
                <th>المقال</th>
                <th>التاريخ</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($row['comment'])); ?></td>
                <td><?php echo $row['article_id']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="delete_comment.php?id=<?php echo $row['id']; ?>" onclick="return confirm('هل أنت متأكد من حذف هذا التعليق؟');">🗑 حذف</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
