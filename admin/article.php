	<?php include("header.php"); ?>
<?php
include 'config.php'; // ملف الاتصال بقاعدة البيانات

// التحقق من وجود المعرف في الرابط
if (!isset($_GET['id'])) {
    die("لم يتم تحديد المقالة.");
}

$article_id = intval($_GET['id']);

// تنفيذ الحذف إذا كان الرابط يحتوي على ?delete=1
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<div style='color: green;'>تم حذف المقالة بنجاح.</div>";
    } else {
        echo "<div style='color: red;'>فشل في حذف المقالة أو أنها غير موجودة.</div>";
    }
    $stmt->close();
} else {
    // جلب بيانات المقالة
    $stmt = $conn->prepare("SELECT title, content FROM articles WHERE id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo "لم يتم العثور على المقالة.";
    } else {
        $stmt->bind_result($title, $content);
        $stmt->fetch();

        echo "<h2>$title</h2>";
        echo "<p>$content</p>";
        echo "<a href='article.php?id=$article_id&delete=1' onclick=\"return confirm('هل أنت متأكد من حذف المقالة؟');\">🗑️ حذف المقالة</a>";
    }

  
}
?>

	<?php include("footer.php"); ?>
