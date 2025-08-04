<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								
?>
<?php include("include/header.php");?>
<?php


if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['uid'];
$query = "SELECT o.*, s.name AS service_name 
          FROM orders o 
          JOIN services s ON o.service_id = s.id 
          WHERE o.user_id = '$user_id' AND o.deleted = 0 
          ORDER BY o.order_date DESC";


$result = mysqli_query($con, $query);
?>

   <style>
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-custom th, .table-custom td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .table-custom th {
            background-color: #007bff;
            color: white;
        }

        .table-custom tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-custom tr:hover {
            background-color: #e9f7ff;
        }

        .table-container {
            overflow-x: auto; /* شريط تمرير أفقي */
            overflow-y: auto; /* شريط تمرير عمودي */
            max-height: 400px; /* ارتفاع البطاقة */
        }

        .btn-delete {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}
.btn-delete:hover {
    background-color: #c0392b;
}

    </style>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4> طلباتي </h4>
        </div>
        <div class="card-body">
            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>الخدمة</th>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            <th>الحساب</th>
                            <th>البريد</th>
                            <th>الوصف</th>
                            <th>الموقع</th>
                            <th>الوقت</th>
                             <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['account']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['description']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><?php echo $row['order_date']; ?></td>
                               <td> <form method="POST" action="delete_order.php" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟');" style="display:inline;">
    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn-delete">🗑️ حذف</button>
</form>
                        </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include("include/footer.php");?>
