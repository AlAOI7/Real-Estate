<?php
include "../include/config.php";
include "../auth_check.php";

$user_id = $_SESSION['user']['id'];
$sql = "SELECT o.id, s.service_name, o.description, o.order_date, o.status
        FROM orders o
        JOIN services s ON o.service_id = s.id
        WHERE o.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h3>طلبات المقاولات الخاصة بك:</h3>
<table border="1">
    <tr>
        <th>رقم الطلب</th>
        <th>الخدمة</th>
        <th>الوصف</th>
        <th>التاريخ</th>
        <th>الحالة</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['service_name'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['order_date'] ?></td>
        <td><?= $row['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
