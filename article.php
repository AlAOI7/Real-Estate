
<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								
?>
<?php include("include/header.php"); ?>
<?php


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

if ($id > 0) {
    // استعلام لجلب بيانات المقالة
    $stmt = $con->prepare("SELECT title, content FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
} else {
    echo "معرّف المقالة غير صالح.";
    exit;
}
?>



<div class="container">
    <!-- <?php if ($msg === 'success'): ?>
        <div class="alert alert-success">تم إضافة تعليقك بنجاح.</div>
    <?php elseif ($msg === 'error'): ?>
        <div class="alert alert-danger">حدث خطأ أثناء إرسال التعليق، تأكد من تعبئة البيانات بشكل صحيح.</div>
    <?php endif; ?> -->

    

  
   <style>
    .comment-card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: 0.3s ease;
    }

    .comment-card:hover {
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .comment-name {
        color: #007bff;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .comment-text {
        color: #333;
        line-height: 1.6;
    }
</style>

<div class="mt-4">
    <h3 class="mb-3">التعليقات:</h3>

    <?php
    $stmt = $con->prepare("SELECT name, comment FROM comments WHERE article_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $comments = $stmt->get_result();

    if ($comments->num_rows > 0):
        while ($row = $comments->fetch_assoc()):
    ?>
        <div class="comment-card">
            <div class="comment-name"><?php echo htmlspecialchars($row['name']); ?></div>
            <div class="comment-text"><?php echo nl2br(htmlspecialchars($row['comment'])); ?></div>
        </div>
    <?php
        endwhile;
    else:
    ?>
        <div class="comment-card" style="text-align:center;">لا توجد تعليقات بعد.</div>
    <?php endif; ?>
</div>


    <!-- نموذج إضافة تعليق -->
    <?php include 'comment_form.php'; // النموذج الذي أرسلته أنت سابقاً ?>
</div>

<?php include("include/footer.php"); ?>