<?php
include 'config.php';
$id = $_GET['id'];

$stmt = $con->prepare("SELECT * FROM reviews WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $update = $conn->prepare("UPDATE reviews SET
        experience_years=?, experience_percent=?,
        projects_count=?, projects_percent=?,
        clients_count=?, clients_percent=?,
        overall_rating=?
        WHERE id=?");
    $update->bind_param("iiiiiidi",
        $_POST['experience_years'],
        $_POST['experience_percent'],
        $_POST['projects_count'],
        $_POST['projects_percent'],
        $_POST['clients_count'],
        $_POST['clients_percent'],
        $_POST['overall_rating'],
        $id
    );
    $update->execute();
    header("Location: reviewsindex.php");
    exit;
}
?>

  <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                      <h2>تعديل تقييم جديد</h2>




<form method="POST" class="container mt-4" style="max-width: 700px;">
    <h2 class="mb-4 text-center">تعديل التقييم</h2>
    <div class="row g-3">
        <div class="col-md-6">
            <label for="experience_years" class="form-label">سنوات الخبرة:</label>
            <input type="number" id="experience_years" name="experience_years" value="<?= $row['experience_years'] ?>" required class="form-control">
        </div>
        <div class="col-md-6">
            <label for="experience_percent" class="form-label">نسبة الخبرة (%):</label>
            <input type="number" id="experience_percent" name="experience_percent" value="<?= $row['experience_percent'] ?>" required class="form-control">
        </div>
        <div class="col-md-6">
            <label for="projects_count" class="form-label">عدد المشاريع:</label>
            <input type="number" id="projects_count" name="projects_count" value="<?= $row['projects_count'] ?>" required class="form-control">
        </div>
        <div class="col-md-6">
            <label for="projects_percent" class="form-label">نسبة المشاريع (%):</label>
            <input type="number" id="projects_percent" name="projects_percent" value="<?= $row['projects_percent'] ?>" required class="form-control">
        </div>
        <div class="col-md-6">
            <label for="clients_count" class="form-label">عدد العملاء:</label>
            <input type="number" id="clients_count" name="clients_count" value="<?= $row['clients_count'] ?>" required class="form-control">
        </div>
        <div class="col-md-6">
            <label for="clients_percent" class="form-label">نسبة رضا العملاء (%):</label>
            <input type="number" id="clients_percent" name="clients_percent" value="<?= $row['clients_percent'] ?>" required class="form-control">
        </div>
        <div class="col-md-6">
            <label for="overall_rating" class="form-label">التقييم العام (من 5):</label>
            <input type="number" step="0.1" max="5" id="overall_rating" name="overall_rating" value="<?= $row['overall_rating'] ?>" required class="form-control">
        </div>
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary px-5">حفظ التغييرات</button>
        </div>
    </div>
</form>

<!-- تأكد من إضافة Bootstrap JS & Popper (اختياري إذا تحتاج وظائف تفاعلية) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


                </div></div>
                  <?php include("footer.php"); ?>