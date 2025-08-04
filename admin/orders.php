<?php 

include("config.php"); // المسار من داخل مجلد admin



$query = "SELECT o.*, s.name AS service_name, u.uname AS username, u.uemail AS useremail
          FROM orders o
          JOIN services s ON o.service_id = s.id
          JOIN user u ON o.user_id = u.uid
          ORDER BY o.order_date DESC";


$result = mysqli_query($con, $query);
?>
<?php include("header.php"); ?>
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

<div class="page-wrapper">
	<div class="content container-fluid">

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>طلبات المستخدمين</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>المستخدم</th>
                            <th>البريد</th>
                            <th>الخدمة</th>
                            <th>الاسم</th>
                            <th>الهاتف</th>
                            <th>الحساب</th>
                            <th>البريد المستخدم</th>
                            <th>الوصف</th>
                            <th>الموقع</th>
                            <th>التاريخ</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
<?php while($row = mysqli_fetch_assoc($result)) { 
    $isDeleted = $row['deleted'] == 1;
    $rowStyle = $isDeleted ? 'style="background-color: #f8d7da; text-decoration: line-through;"' : '';
?>
    <tr <?php echo $rowStyle; ?>>
        <td><?php echo htmlspecialchars($row['username']); ?></td>
        <td><?php echo htmlspecialchars($row['useremail']); ?></td>
        <td><?php echo htmlspecialchars($row['service_name']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td><?php echo htmlspecialchars($row['account']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['description']); ?></td>
        <td><?php echo htmlspecialchars($row['location']); ?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td>
            <?php if (!$isDeleted) { ?>
                <form method="POST" action="delete_order.php" onsubmit="return confirm('هل أنت متأكد من حذف الطلب؟');">
                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn-delete">🗑️</button>
                </form>
            <?php } else { ?>
                <span style="color: #c0392b;">محذوف</span>
            <?php } ?>
        </td>
    </tr>
<?php } ?>
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<?php include("footer.php"); ?>
