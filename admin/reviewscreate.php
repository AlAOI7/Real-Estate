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

<form method="POST">
    <h2>إضافة تقييم جديد</h2>
    <label>سنوات الخبرة: <input type="number" name="experience_years" required></label><br>
    <label>نسبة الخبرة (%): <input type="number" name="experience_percent" required></label><br>
    <label>عدد المشاريع: <input type="number" name="projects_count" required></label><br>
    <label>نسبة المشاريع (%): <input type="number" name="projects_percent" required></label><br>
    <label>عدد العملاء: <input type="number" name="clients_count" required></label><br>
    <label>نسبة رضا العملاء (%): <input type="number" name="clients_percent" required></label><br>
    <label>التقييم العام (من 5): <input type="number" step="0.1" max="5" name="overall_rating" required></label><br><br>
    <button type="submit">إضافة</button>
</form>
