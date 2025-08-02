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
            $image_path = 'uploads/' . time() . '_' . $_FILES['images']['name'][$key];
            move_uploaded_file($tmp_name, $image_path);
            mysqli_query($con, "INSERT INTO project_images (project_id, image_path) VALUES ($id, '$image_path')");
        }
    }

    echo "<script>alert('تم التعديل بنجاح'); window.location.href='projects.php';</script>";
}

$project_images = mysqli_query($con, "SELECT * FROM project_images WHERE project_id = $id");
?>

<h2>تعديل المشروع</h2>
<form method="post" enctype="multipart/form-data">
    <label>اسم المشروع:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($project['name']); ?>"><br>

    <label>العنوان:</label>
    <input type="text" name="address" value="<?php echo htmlspecialchars($project['address']); ?>"><br>

    <label>الخصائص:</label>
    <input type="text" name="features" value="<?php echo htmlspecialchars($project['features']); ?>"><br>

    <label>الوصف:</label>
    <textarea name="description"><?php echo htmlspecialchars($project['description']); ?></textarea><br>

    <label>الفئة:</label>
    <select name="category_id">
        <?php while($cat = mysqli_fetch_assoc($categories)): ?>
            <option value="<?php echo $cat['id']; ?>" <?php if ($cat['id'] == $project['category_id']) echo 'selected'; ?>>
                <?php echo $cat['name']; ?>
            </option>
        <?php endwhile; ?>
    </select><br>

    <label>صور المشروع (يمكنك رفع صور جديدة):</label>
    <input type="file" name="images[]" multiple><br>

    <label>الصور الحالية:</label><br>
    <?php while($img = mysqli_fetch_assoc($project_images)): ?>
        <div style="display:inline-block;margin:10px;">
            <img src="<?php echo $img['image_path']; ?>" width="100"><br>
            <input type="checkbox" name="delete_image_ids[]" value="<?php echo $img['id']; ?>"> حذف
        </div>
    <?php endwhile; ?>

    <br><br>
    <input type="submit" value="حفظ التعديلات">
</form>
