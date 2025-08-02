<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عرض السلايدر</title>
</head>
<body>
    <h2>جميع السلايدرات</h2>
    <a href="createsliders.php">إضافة سلايدر جديد</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>الصورة</th>
                <th>العنوان</th>
                <th>الوصف</th>
                <th>نص الزر</th>
                <th>رابط الزر</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = mysqli_query($con, "SELECT * FROM sliders ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='uploads/".$row['image']."' width='100'></td>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['subtitle']."</td>";
                    echo "<td>".$row['button_text']."</td>";
                    echo "<td>".$row['button_link']."</td>";
                    echo "<td>
                            <a href='editsliders.php?id=".$row['id']."'>تعديل</a> |
                            <a href='deletesliders.php?id=".$row['id']."' onclick=\"return confirm('هل أنت متأكد من الحذف؟')\">حذف</a>
                          </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
