<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عرض التقييمات</title>
</head>
<body>
    <h2>قائمة التقييمات</h2>
    <a href="reviewscreate.php">إضافة تقييم جديد</a>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>الخبرة</th>
                <th>المشاريع</th>
                <th>العملاء</th>
                <th>التقييم العام</th>
                <th>تحكم</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM reviews");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['experience_years'] ?> سنة (<?= $row['experience_percent'] ?>%)</td>
                <td><?= $row['projects_count'] ?> مشروع (<?= $row['projects_percent'] ?>%)</td>
                <td><?= $row['clients_count'] ?> عميل (<?= $row['clients_percent'] ?>%)</td>
                <td><?= $row['overall_rating'] ?> / 5</td>
                <td>
                    <a href="reviewsedit.php?id=<?= $row['id'] ?>">تعديل</a> |
                    <a href="reviewsdelete.php?id=<?= $row['id'] ?>" onclick="return confirm('هل تريد الحذف؟')">حذف</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
