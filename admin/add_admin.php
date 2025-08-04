<?php include("header.php"); ?>
			
<?php

$error = $msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auser  = $_POST['auser'];
    $aemail = $_POST['aemail'];
    $apass  = $_POST['apass'];
    $adob   = $_POST['adob'];
    $aphone = $_POST['aphone'];

    // يمكنك استخدام تشفير كلمة المرور هنا مثل:
    // $apass = password_hash($apass, PASSWORD_BCRYPT);

    $insert = "INSERT INTO admin (auser, aemail, apass, adob, aphone) VALUES ('$auser', '$aemail', '$apass', '$adob', '$aphone')";
    if (mysqli_query($con, $insert)) {
        $msg = "تمت إضافة الأدمن بنجاح.";
    } else {
        $error = "حدث خطأ أثناء الإضافة.";
    }
}
?>
     <div class="page-wrapper">
                <div class="content container-fluid">


<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">إضافة أدمن جديد</div>
        <div class="card-body">
            <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <?php if ($msg) echo "<div class='alert alert-success'>$msg</div>"; ?>
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>الاسم</label>
                        <input type="text" name="auser" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>البريد الإلكتروني</label>
                        <input type="email" name="aemail" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>كلمة المرور</label>
                        <input type="password" name="apass" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>تاريخ الميلاد</label>
                        <input type="date" name="adob" class="form-control" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="text" name="aphone" class="form-control" >
                </div>
                
                <button type="submit" class="btn btn-success btn-block">إضافة</button>
            </form>
        </div>
    </div>
</div>
                </div>
     </div>
<?php include("footer.php"); ?>
