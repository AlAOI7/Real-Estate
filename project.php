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
    <div class="row gx-5">
        <div class="col-12 text-center">
            <div class="d-inline-block bg-dark-radial text-center pt-4 ps-5 pe-0 mb-5">
                <ul class="list-inline mb-0" id="portfolio-flters">
                    <li class="btn btn-outline-primary bg-white p-2 active mx-2 mb-4" data-filter="*">
                        <img src="img/30.jpeg" style="width: 150px; height: 100px;">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <h6 class="text-white text-uppercase m-0">الكل</h6>
                        </div>
                    </li>
                    <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".first">
                        <img src="img/31.jpeg" style="width: 150px; height: 100px;">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <h6 class="text-white text-uppercase m-0">إنشاءات</h6>
                        </div>
                    </li>
                    <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".second">
                        <img src="img/32.jpeg" style="width: 150px; height: 100px;">
                        <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                            <h6 class="text-white text-uppercase m-0">ترميم</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row g-5 portfolio-container">
        <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
            <div class="position-relative portfolio-box">
                <img class="img-fluid w-100" src="img/33.jpeg" alt="مشروع إنشاءات">
                <a class="portfolio-title shadow-sm" href="">
                    <p class="h4 text-uppercase">اسم المشروع</p>
                    <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>الهدا، الطائف</span>
                </a>
                <a class="portfolio-btn" href="img/33.jpeg" data-lightbox="portfolio">
                    <i class="bi bi-plus text-white"></i>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second">
            <div class="position-relative portfolio-box">
                <img class="img-fluid w-100" src="img/27.jpeg" alt="مشروع ترميم">
                <a class="portfolio-title shadow-sm" href="">
                    <p class="h4 text-uppercase">اسم المشروع</p>
                    <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>الهدا، الطائف</span>
                </a>
                <a class="portfolio-btn" href="img/27.jpeg" data-lightbox="portfolio">
                    <i class="bi bi-plus text-white"></i>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
            <div class="position-relative portfolio-box">
                <img class="img-fluid w-100" src="img/28.jpeg" alt="مشروع إنشاءات">
                <a class="portfolio-title shadow-sm" href="">
                    <p class="h4 text-uppercase">اسم المشروع</p>
                    <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>الهدا، الطائف</span>
                </a>
                <a class="portfolio-btn" href="img/28.jpeg" data-lightbox="portfolio">
                    <i class="bi bi-plus text-white"></i>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second">
            <div class="position-relative portfolio-box">
                <img class="img-fluid w-100" src="img/29.jpeg" alt="مشروع ترميم">
                <a class="portfolio-title shadow-sm" href="">
                    <p class="h4 text-uppercase">اسم المشروع</p>
                    <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>الهدا، الطائف</span>
                </a>
                <a class="portfolio-btn" href="img/29.jpeg" data-lightbox="portfolio">
                    <i class="bi bi-plus text-white"></i>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first">
            <div class="position-relative portfolio-box">
                <img class="img-fluid w-100" src="img/30.jpeg" alt="مشروع إنشاءات">
                <a class="portfolio-title shadow-sm" href="">
                    <p class="h4 text-uppercase">اسم المشروع</p>
                    <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>الهدا، الطائف</span>
                </a>
                <a class="portfolio-btn" href="img/30.jpeg" data-lightbox="portfolio">
                    <i class="bi bi-plus text-white"></i>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second">
            <div class="position-relative portfolio-box">
                <img class="img-fluid w-100" src="img/31.jpeg" alt="مشروع ترميم">
                <a class="portfolio-title shadow-sm" href="">
                    <p class="h4 text-uppercase">اسم المشروع</p>
                    <span class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i>الهدا، الطائف</span>
                </a>
                <a class="portfolio-btn" href="img/31.jpeg" data-lightbox="portfolio">
                    <i class="bi bi-plus text-white"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- نهاية قسم المشاريع -->
    
<?php include("include/footer.php");?>