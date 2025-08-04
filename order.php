<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								
?>
<?php include("include/header.php");?>
<?php


if (!isset($_SESSION['uemail'])) {
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id'] ?? 0);

// جلب بيانات الخدمة
$service = [];
if ($id) {
    $query = "SELECT * FROM services WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $query);
    $service = mysqli_fetch_assoc($result);
}

if (!$service) {
    echo "<p>الخدمة غير موجودة.</p>";
    exit();
}

// عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $date = date("Y-m-d H:i:s"); // وقت الطلب

    $user_id = $_SESSION['uid'];

    // إدخال الطلب في قاعدة البيانات
$insert = "INSERT INTO orders (user_id, service_id, name, phone, account, description, email, location, order_date)
           VALUES ('$user_id', '$id', '$name', '$phone', '$account','$description', '$email', '$location', '$date')";

    mysqli_query($con, $insert);

    echo "<p class='alert alert-success'>تم إرسال الطلب بنجاح!</p>";
}
?>
 
<h2>طلب الخدمة: <?php echo htmlspecialchars($service['name']); ?></h2>
 <div class="container">
<form method="POST">
   
        <div class="row g-3">
            <div class="col-12 form-group col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="اسمك" required>
                </div>
            </div>
           <div class="col-12 form-group col-md-6">
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف" required>
                </div>
            </div>
      
            <div class="col-12 form-group col-md-6">
                <div class="form-group">
                    <input type="text" name="account" class="form-control" placeholder="حسابك" required>
                </div>
            </div>
            <div class="col-12 form-group col-md-6">
    <div class="form-group">
        <textarea name="description" class="form-control" placeholder="وصف الطلب" rows="4" required></textarea>
    </div>
</div>
            <div class="col-12 form-group col-md-6">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                </div>
            </div>
       
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="location" class="form-control" placeholder="موقعك" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">إرسال الطلب</button>
  
</form>
  </div>
<?php include("include/footer.php");?>
