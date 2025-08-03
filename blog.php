
    <?php include("include/header.php");?>

<?php 

include("config.php");
								
?>  
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">المدونه</h1>
 
    </div>
    <!-- Page Header Start -->

<!-- بداية قسم المدونة -->
<?php

$query = "SELECT id, title, short_details, image FROM blog_articles ORDER BY id DESC";
$result = mysqli_query($con, $query);
?>

<div class="container-fluid py-6 ps-5 pe-0">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">أحدث <span class="text-primary">المقالات</span> من مشاركات مدونتنا</h1>
    </div>
    <div class="row g-5">
        <?php while($article = mysqli_fetch_assoc($result)): ?>
        <div class="col-lg-4 col-md-6">
            <div class="bg-light">
                <img class="img-fluid" src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                <div class="p-4">
                    <h4 class="text-uppercase mb-3"><?php echo htmlspecialchars($article['title']); ?></h4>
                    <p><?php echo htmlspecialchars(mb_strimwidth($article['short_details'], 0, 80, '...')); ?></p>
                    <a class="text-uppercase fw-bold" href="blog_details.php?id=<?php echo $article['id']; ?>">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<!-- نهاية قسم المدونة -->
 
<?php include("include/footer.php");?>