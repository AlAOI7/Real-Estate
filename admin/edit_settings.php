<?php
include("config.php"); // الاتصال بقاعدة البيانات


// تحقق من تسجيل الدخول إن احتجت
// if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }

$msg = "";

// عند إرسال النموذج
if (isset($_POST['update_settings'])) {
    $site_title = mysqli_real_escape_string($con, $_POST['site_title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $whatsapp = mysqli_real_escape_string($con, $_POST['whatsapp']);
    $copyright = mysqli_real_escape_string($con, $_POST['copyright']);

    // فحص إذا تم رفع فافيكون جديد
    if (!empty($_FILES['favicon']['name'])) {
        $favicon_name = 'upload/' . basename($_FILES['favicon']['name']);
        move_uploaded_file($_FILES['favicon']['tmp_name'], $favicon_name);
        $favicon_update = ", favicon='$favicon_name'";
    } else {
        $favicon_update = "";
    }

    // التحديث
    $update = "UPDATE settings SET
        site_title='$site_title',
        description='$description',
        address='$address',
        phone='$phone',
        whatsapp='$whatsapp',
        copyright='$copyright'
        $favicon_update
        WHERE id=1
    ";
    if (mysqli_query($con, $update)) {
        $msg = "<p class='alert alert-success'>تم تحديث البيانات بنجاح.</p>";
    } else {
        $msg = "<p class='alert alert-danger'>فشل التحديث.</p>";
    }
}

// جلب البيانات الحالية
$result = mysqli_query($con, "SELECT * FROM settings LIMIT 1");
$data = mysqli_fetch_assoc($result);
?>

    
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل الإعدادات</title>
</head>
   <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
             
                <style>
  .form-label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-control {
    width: 100%;
    padding: 8px 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .col-md-6 {
    flex: 0 0 48%;
  }

  .btn {
    padding: 10px 25px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
  }

  .btn:hover {
    background-color: #0056b3;
  }
</style>

<div class="container">
    <h2>تعديل الإعدادات العامة</h2>
    <?php echo $msg; ?>
 <form method="post" enctype="multipart/form-data">
  <div class="row g-3">

    <div class="col-md-6">
      <label class="form-label">عنوان الموقع:</label>
      <input type="text" name="site_title" class="form-control" value="<?php echo $data['site_title']; ?>" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">الوصف:</label>
      <textarea name="description" class="form-control" rows="4" required><?php echo $data['description']; ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">العنوان:</label>
      <input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">رقم الهاتف:</label>
      <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">رقم الواتساب:</label>
      <input type="text" name="whatsapp" class="form-control" value="<?php echo $data['whatsapp']; ?>" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">نص الحقوق:</label>
      <textarea name="copyright" class="form-control" rows="2"><?php echo $data['copyright']; ?></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">تغيير الفافيكون (اختياري):</label>
      <input type="file" name="favicon" class="form-control">
      <?php if (!empty($data['favicon'])) { ?>
        <div class="mt-2">
          <img src="<?php echo $data['favicon']; ?>" width="32" height="32" alt="favicon">
        </div>
      <?php } ?>
    </div>

    <div class="col-12">
      <button type="submit" name="update_settings" class="btn btn-primary mt-3">حفظ التغييرات</button>
    </div>

  </div>
</form>

</div>
                </div>
     </div>
  <?php include("footer.php"); ?>
