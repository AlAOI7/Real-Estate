<?php
include 'config.php';
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM reviews WHERE id = ?");
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

<form method="POST">
    <h2>تعديل التقييم</h2>
    <label>سنوات الخبرة: <input type="number" name="experience_years" value="<?= $row['experience_years'] ?>" required></label><br>
    <label>نسبة الخبرة (%): <input type="number" name="experience_percent" value="<?= $row['experience_percent'] ?>" required></label><br>
    <label>عدد المشاريع: <input type="number" name="projects_count" value="<?= $row['projects_count'] ?>" required></label><br>
    <label>نسبة المشاريع (%): <input type="number" name="projects_percent" value="<?= $row['projects_percent'] ?>" required></label><br>
    <label>عدد العملاء: <input type="number" name="clients_count" value="<?= $row['clients_count'] ?>" required></label><br>
    <label>نسبة رضا العملاء (%): <input type="number" name="clients_percent" value="<?= $row['clients_percent'] ?>" required></label><br>
    <label>التقييم العام (من 5): <input type="number" step="0.1" max="5" name="overall_rating" value="<?= $row['overall_rating'] ?>" required></label><br><br>
    <button type="submit">حفظ التغييرات</button>
</form>
