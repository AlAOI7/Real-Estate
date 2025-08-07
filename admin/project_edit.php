<?php
include 'config.php';

// جلب بيانات المشروع
$id = $_GET['id'];
$project = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM projects WHERE id = $id"));
$categories = mysqli_query($con, "SELECT * FROM categories");

// تعديل البيانات
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $features = $_POST['features'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    // تحديث البيانات
    mysqli_query($con, "UPDATE projects SET name='$name', address='$address', features='$features', description='$description', category_id=$category_id WHERE id = $id");

    // حذف صورة قديمة إن تم طلب الحذف
    if (!empty($_POST['delete_image_ids'])) {
        foreach ($_POST['delete_image_ids'] as $img_id) {
            $img = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM project_images WHERE id = $img_id"));
            if ($img) {
                unlink($img['image_path']);
                mysqli_query($con, "DELETE FROM project_images WHERE id = $img_id");
            }
        }
    }

    // رفع صور جديدة
    if (!empty($_FILES['images']['name'][0])) {
      foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    // اسم الصورة مع إضافة الوقت (لتجنب التكرار)
    $image_name = time() . '_' . $_FILES['images']['name'][$key];
    // مسار حفظ الصورة الفعلي في المجلد
    $file_path = 'uploads/' . $image_name;
    
    // رفع الملف إلى المجلد
    move_uploaded_file($tmp_name, $file_path);
    
    // تخزين اسم الملف فقط في قاعدة البيانات
    mysqli_query($con, "INSERT INTO project_images (project_id, image_path) VALUES ($id, '$image_name')");
}
    }

    echo "<script>alert('تم التعديل بنجاح'); window.location.href='projects.php';</script>";
}

$project_images = mysqli_query($con, "SELECT * FROM project_images WHERE project_id = $id");
?>

 <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                    
 <a href="projects.php"  class="add-button"> مشروع </a>



    <h2 class="text-center my-4">تعديل المشروع</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label>اسم المشروع:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($project['name']); ?>" class="form-control">
            </div>
    
            <div class="col-md-6">
                <label>العنوان:</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($project['address']); ?>" class="form-control">
            </div>
       
            <div class="col-md-6">
                <label>الخصائص:</label>
                <input type="text" name="features" value="<?php echo htmlspecialchars($project['features']); ?>" class="form-control">
            </div>
       
            <div class="col-md-6">
                <label>الوصف:</label>
                <textarea name="description" class="form-control" rows="4"><?php echo htmlspecialchars($project['description']); ?></textarea>
            </div>
       
            <div class="col-md-6">
                <label>الفئة:</label>
                <select name="category_id" class="form-control">
                    <?php while($cat = mysqli_fetch_assoc($categories)): ?>
                        <option value="<?php echo $cat['id']; ?>" <?php if ($cat['id'] == $project['category_id']) echo 'selected'; ?>>
                            <?php echo $cat['name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
       
            <div class="col-md-6">
                <label>صور المشروع (يمكنك رفع صور جديدة):</label>
                <input type="file" name="images[]" multiple class="form-control-file">
            </div>
   
            <div class="col-md-6">
                <label>الصور الحالية:</label>
                <div class="d-flex flex-wrap">
                    <?php while($img = mysqli_fetch_assoc($project_images)): ?>
                        <div class="text-center m-2">
                            <img src="<?php echo $img['image_path']; ?>" width="100" class="border p-1"><br>
                            <input type="checkbox" name="delete_image_ids[]" value="<?php echo $img['id']; ?>"> حذف
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <!-- الصف الأول من الأزرار -->
        <div class="row mt-4">
            <div class="col-md-6">
                <input type="submit" value="💾 حفظ التعديلات" class="btn btn-success btn-block">
            </div>
            <div class="col-md-6">
                <input type="reset" value="↺ إعادة تعيين" class="btn btn-warning btn-block">
            </div>
        </div>

        <!-- الصف الثاني من الأزرار -->
        <div class="row mt-2 mb-4">
            
            <div class="col-md-6">
                <button type="button" onclick="window.history.back()" class="btn btn-danger btn-block">✖ إلغاء</button>
            </div>
        </div>
    </form>



                </div>
     </div>
      <?php include("footer.php"); ?>