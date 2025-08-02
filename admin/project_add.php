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
<form method="POST" enctype="multipart/form-data">
    الفئة:
    <select name="category_id">
        <?php while($cat = mysqli_fetch_assoc($categories)): ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php endwhile; ?>
    </select><br>
    الاسم: <input type="text" name="name"><br>
    الموقع: <input type="text" name="address"><br>
    الخصائص: <input type="text" name="features"><br>
    الوصف: <textarea name="description"></textarea><br>
    صور المشروع: <input type="file" name="images[]" multiple><br>
    <button type="submit">حفظ</button>
</form>
