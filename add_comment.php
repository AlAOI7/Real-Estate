<?php
include 'config.php'; // تأكد أن ملف الاتصال موجود

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $article_id = intval($_POST['article_id']);
    $name       = trim($_POST['name']);
    $email      = trim($_POST['email']);
    $website    = trim($_POST['website']);
    $comment    = trim($_POST['comment']);

    if ($name && $email && $comment) {
        $stmt = $conn->prepare("INSERT INTO comments (article_id, name, email, website, comment) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $article_id, $name, $email, $website, $comment);
        $stmt->execute();
        header("Location: article.php?id=$article_id&msg=success");
        exit;
    } else {
        header("Location: article.php?id=$article_id&msg=error");
        exit;
    }
}
?>
