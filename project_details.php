
<?php include("include/header.php");?>
<?php
include 'config.php';

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die("المشروع غير موجود");
}

// جلب بيانات المشروع
$sql = "SELECT p.*, c.name as category_name FROM projects p JOIN categories c ON p.category_id = c.id WHERE p.id = $id";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) == 0) {
    die("المشروع غير موجود");
}
$project = mysqli_fetch_assoc($result);

// جلب صور المشروع
$images_res = mysqli_query($con, "SELECT image_path FROM project_images WHERE project_id = $id");
$images = [];
while ($row = mysqli_fetch_assoc($images_res)) {
    $images[] = $row['image_path'];
}
?><style>
    .main-image-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .main-image {
        max-width: 100%;
        max-height: 500px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .thumbnail-slider {
        display: flex;
        overflow-x: auto;
        gap: 10px;
        padding: 10px;
        justify-content: center;
    }

    .thumbnail-slider img {
        max-height: 100px;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .thumbnail-slider img:hover {
        transform: scale(1.05);
        border: 2px solid #007bff;
    }

    .thumbnail-slider::-webkit-scrollbar {
        display: none;
    }

   .project-card {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
    direction: rtl;
    text-align: center; /* أضفت هذا */
}

.project-card h2 {
    color: #343a40;
    margin-bottom: 15px;
}

.project-card p {
    font-size: 16px;
    color: #555;
    margin-bottom: 10px;
}


    h4 {
        text-align: center;
        margin-top: 40px;
        font-weight: bold;
    }
</style>

<!-- الصورة الرئيسية -->
<div class="main-image-container">
    <img id="mainImage" src="<?php echo htmlspecialchars($images[0]); ?>" alt="Main Project Image" class="main-image">
</div>
<h4>صور المشروع</h4>
<!-- الصور المصغرة -->
<div class="thumbnail-slider">
    <?php foreach ($images as $img_path): ?>
        <img src="<?php echo htmlspecialchars($img_path); ?>" alt="Project Image" onclick="changeMainImage(this)">
    <?php endforeach; ?>
</div>

<!-- تفاصيل المشروع داخل كارد -->
<div class="card project-card">
    <h2><?php echo htmlspecialchars($project['name']); ?></h2>
    <p><strong>العنوان:</strong> <?php echo htmlspecialchars($project['address']); ?></p>
    <p><strong>الفئة:</strong> <?php echo htmlspecialchars($project['category_name']); ?></p>
    <p><strong>مميزات المشروع:</strong> <?php echo nl2br(htmlspecialchars($project['features'])); ?></p>
    <p><strong>وصف المشروع:</strong><br><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
</div>



<script>
    function changeMainImage(img) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = img.src;
    }
</script>


<?php include("include/footer.php");?>