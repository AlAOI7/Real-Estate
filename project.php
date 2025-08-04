<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								
?>

    <?php include("include/header.php");?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">المشاريع</h1>
      
    </div>
    <!-- Page Header Start -->
    
<style>
    .video-container {
        background-color: #fff;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        border-radius: 10px;
        margin-bottom: 20px; /* مسافة بين الفيديوهات */
    }
    video {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="row g-4">
        <!-- عرض الفيديوهات -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="1.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="2.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="3.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="4.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="5.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="6.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="video-container">
                <video controls>
                    <source src="7.mp4" type="video/mp4">
                    المتصفح لا يدعم تشغيل الفيديو.
                </video>
            </div>
        </div>
    </div>
</div>

    <!-- بداية قسم المشاريع -->
<div class="container-fluid bg-light py-6 ps-5 pe-0">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">بعض من <span class="text-primary">أشهر</span> مشاريعنا</h1>
    </div>

     <style>
        .contact-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .btn-custom {
            margin: 0 10px;
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-whatsapp {
            background-color: #25D366; /* لون واتساب */
        }
        .btn-call {
            background-color: #002fff; /* لون الاتصال */
        }
        .btn-custom:hover {
            opacity: 0.9; /* تأثير عند التمرير */
        }
    </style>

    <div class="container">
        <div class="contact-buttons">
            <a href="https://wa.me/+967773748697" target="_blank" title="واتساب" class="btn-custom btn-whatsapp">
                <i class="fab fa-whatsapp"></i> واتساب
            </a>
            <a href="tel:+967773748697" class="btn-custom btn-call" title="اتصال">
                <i class="fas fa-phone"></i> اتصال
            </a>
        </div>
    </div>
    <br>
 <!-- نهاية قسم الخدمات -->
<?php

        // جلب الفئات
        $categories_result = mysqli_query($con, "SELECT * FROM categories ORDER BY id");

        // جلب المشاريع حسب الفلتر أو الكل
        $filter = $_GET['filter'] ?? '*';

        if ($filter == '*' || empty($filter)) {
            $projects_result = mysqli_query($con, "SELECT p.*, c.class_name FROM projects p JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC");
        } else {
            $filter_escaped = mysqli_real_escape_string($con, $filter);
            $cat_res = mysqli_query($con, "SELECT id FROM categories WHERE class_name = '$filter_escaped'");
            $cat = mysqli_fetch_assoc($cat_res);
            $cat_id = $cat ? $cat['id'] : 0;

            $projects_result = mysqli_query($con, "SELECT p.*, c.class_name FROM projects p JOIN categories c ON p.category_id = c.id WHERE p.category_id = $cat_id ORDER BY p.id DESC");
        }
?>


        <!-- بداية قسم المشاريع -->
        <div class="container-fluid bg-light py-6 ps-5 pe-0">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4">بعض من <span class="text-primary">أشهر</span> مشاريعنا</h1>
            </div>
            <div class="row gx-5">
                <div class="col-12 text-center">
                    <div class="d-inline-block bg-dark-radial text-center pt-4 ps-5 pe-0 mb-5">
                        <ul class="list-inline mb-0" id="portfolio-flters">
                            <?php while($cat = mysqli_fetch_assoc($categories_result)): ?>
                                <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4 <?php echo ($filter == $cat['class_name'] || ($filter == '*' && $cat['class_name']=='*')) ? 'active' : '' ?>"
                                    data-filter="<?php echo $cat['class_name']; ?>">
                                    <a href="?filter=<?php echo $cat['class_name']; ?>" style="text-decoration:none; color:inherit;">
                                        <!-- <img src="<?php echo htmlspecialchars($cat['image']); ?>" style="width: 150px; height: 100px;"> -->
                                       <img src="admin/uploads/<?php echo htmlspecialchars($cat['image']); ?>" style="width: 150px; height: 100px; object-fit: cover;" alt="صورة القسم">

                                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                            <h6 class="text-white text-uppercase m-0"><?php echo htmlspecialchars($cat['name']); ?></h6>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row g-5 portfolio-container">
                <?php while($project = mysqli_fetch_assoc($projects_result)): ?>
                    <?php
                        $proj_id = $project['id'];
                        $img_res = mysqli_query($con, "SELECT image_path FROM project_images WHERE project_id = $proj_id LIMIT 1");
                        $img = mysqli_fetch_assoc($img_res);
                        $img_src = $img ? $img['image_path'] : 'img/default.jpg';
                    ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item <?php echo htmlspecialchars($project['class_name']); ?>">
                        <div class="position-relative portfolio-box">
                            <img class="img-fluid w-100" src="<?php echo htmlspecialchars($img_src); ?>" alt="<?php echo htmlspecialchars($project['name']); ?>">
                            <a class="portfolio-title shadow-sm" href="project_details.php?id=<?php echo $proj_id; ?>">
                                <p class="h4 text-uppercase"><?php echo htmlspecialchars($project['name']); ?></p>
                                <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo htmlspecialchars($project['address']); ?></span>
                            </a>
                            <a class="portfolio-btn" href="<?php echo htmlspecialchars($img_src); ?>" data-lightbox="portfolio">
                                <i class="bi bi-plus text-white"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>

</div>
<!-- نهاية قسم المشاريع -->
    
<?php include("include/footer.php");?>