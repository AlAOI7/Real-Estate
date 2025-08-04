    <?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								
?>
    <?php include("include/header.php");?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">اتصل بناء</h1>
  
    </div>
    <!-- Page Header Start -->


 <!-- بداية قسم الاتصال -->
<div class="container-fluid py-6 ps-5 pe-0">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">الرجاء <span class="text-primary">عدم التردد</span> في الاتصال بنا</h1>
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
    <div class="row gx-0 align-items-center">
        <div class="col-lg-12 mb-6 mb-lg-0" style="height: 600px;">
    <iframe class="w-100 h-100"
        src="https://www.google.com/maps?q=21.357139,40.279528&output=embed"
        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
</div>
        
    </div>
</div>
<!-- نهاية قسم الاتصال -->
<?php include("include/footer.php");?>