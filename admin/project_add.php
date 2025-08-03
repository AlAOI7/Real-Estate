<?php
include 'config.php';

$categories = mysqli_query($con, "SELECT * FROM categories");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cat = $_POST['category_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $features = $_POST['features'];
    $desc = $_POST['description'];
    
    mysqli_query($con, "INSERT INTO projects (category_id, name, address, features, description) 
                        VALUES ('$cat', '$name', '$address', '$features', '$desc')");
    $project_id = mysqli_insert_id($con);

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $file = 'img/' . $_FILES['images']['name'][$key];
        move_uploaded_file($tmp_name, $file);
        mysqli_query($con, "INSERT INTO project_images (project_id, image_path) VALUES ('$project_id', '$file')");
    }

    header('Location: projects.php');
    exit;
}
?>


 <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                    
 <a href="projects.php"  class="add-button"> مشروع </a>


<form method="POST" enctype="multipart/form-data" >

    <div class="row">
        <div class="col-md-6">
            <label>الفئة:</label>
            <select name="category_id" class="form-control">
                <?php while($cat = mysqli_fetch_assoc($categories)): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
   
        <div class="col-md-6">
            <label>الاسم:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="col-md-6">
            <label>الموقع:</label>
            <input type="text" name="address" class="form-control">
        </div>
    
        <div class="col-md-6">
            <label>الخصائص:</label>
            <input type="text" name="features" class="form-control">
        </div>
    
        <div class="col-md-6">
            <label>الوصف:</label>
            <textarea name="description" rows="4" class="form-control"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>صور المشروع: صور متعدده</label>
            <input type="file" name="images[]" multiple class="form-control-file">
        </div>
    </div>

    <!-- الصف الأول من الأزرار -->
    <div class="row mb-2">
        <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-success btn-block">💾 حفظ</button>
        </div>
        <div class="col-md-6 text-left">
            <button type="reset" class="btn btn-warning btn-block">↺ إعادة تعيين</button>
        </div>
    </div>

    <!-- الصف الثاني من الأزرار -->
    <div class="row">
      
        <div class="col-md-6 text-left">
            <button type="button" onclick="window.history.back()" class="btn btn-danger btn-block">✖ إلغاء</button>
        </div>
    </div>

</form>

                </div>
     </div>
      <?php include("footer.php"); ?>
