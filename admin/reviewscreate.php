<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "INSERT INTO reviews (
        experience_years, experience_percent,
        projects_count, projects_percent,
        clients_count, clients_percent,
        overall_rating
    ) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiid",
        $_POST['experience_years'],
        $_POST['experience_percent'],
        $_POST['projects_count'],
        $_POST['projects_percent'],
        $_POST['clients_count'],
        $_POST['clients_percent'],
        $_POST['overall_rating']
    );
    $stmt->execute();
    header("Location: reviewsindex.php");
    exit;
}
?>
   <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                      <h2>إضافة تقييم جديد</h2>


<form method="POST" enctype="multipart/form-data" class="container mt-4">
  <div class="row g-3">
    <div class="col-md-6">
      <label for="experience_years" class="form-label">سنوات الخبرة:</label>
      <input type="number" name="experience_years" id="experience_years" class="form-control" >
    </div>
    <div class="col-md-6">
      <label for="experience_percent" class="form-label">نسبة الخبرة (%):</label>
      <input type="number" name="experience_percent" id="experience_percent" class="form-control" >
    </div>

    <div class="col-md-6">
      <label for="projects_count" class="form-label">عدد المشاريع:</label>
      <input type="number" name="projects_count" id="projects_count" class="form-control" >
    </div>
    <div class="col-md-6">
      <label for="projects_percent" class="form-label">نسبة المشاريع (%):</label>
      <input type="number" name="projects_percent" id="projects_percent" class="form-control" >
    </div>

    <div class="col-md-6">
      <label for="clients_count" class="form-label">عدد العملاء:</label>
      <input type="number" name="clients_count" id="clients_count" class="form-control" >
    </div>
    <div class="col-md-6">
      <label for="clients_percent" class="form-label">نسبة رضا العملاء (%):</label>
      <input type="number" name="clients_percent" id="clients_percent" class="form-control" >
    </div>

    <div class="col-md-6">
      <label for="overall_rating" class="form-label">التقييم العام (من 5):</label>
      <input type="number" step="0.1" max="5" name="overall_rating" id="overall_rating" class="form-control" >
    </div>

    <div >
      <button type="submit" class="btn btn-primary ">إضافة</button>
    </div>
  </div>
</form>


</div></div>
  <?php include("footer.php"); ?>

