<?php 

include("config.php");								
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>المقاولات والبناء الحديث</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
           <!-- Font Awesome لتحميل الأيقونات -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>

            .fixed-icons {
            position: fixed;
            top: 50%;
            left: 20px;
            z-index: 9999; /* تأكد أنها فوق كل العناصر */
            display: flex;
            flex-direction: column;
            gap: 10px;
            }

            .fixed-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #25D366; /* لون واتساب */
            color: white;
            text-decoration: none;
            font-size: 24px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

            body {
            background-color: #f8f9fa;
            direction: rtl;
            text-align: right;
            overflow-x: hidden;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin-inline: auto;
      padding-inline: 15px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin-inline: -15px;
    }

    .col {
      flex: 1;
      padding-inline: 15px;
    }
     @media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }
</style>

</head>
<body>
  <!-- الأيقونات -->
 <div class="fixed-icons">
    <a href="https://wa.me/+967773748697" target="_blank" title="واتساب">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:+967773748697" class="phone" style="background-color:#002fff"  title="اتصال">
      <i class="fas fa-phone"></i>
    </a>
  </div>
  <!-- بداية الشريط العلوي -->
    <div class="container-fluid ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-5">
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">مكتبنا</h6>
                        <span>الهدا، الطائف</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">راسلنا عبر البريد</h6>
                        <span>info@example.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">اتصل بنا</h6>
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- نهاية الشريط العلوي -->
<!-- php session_start(); -->

<!-- بداية شريط التنقل -->
<div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm ps-5 pe-0 pe-lg-0">
    <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
        <a href="index.php" class="navbar-brand">
            <h5 class=" text-white">
                <i class="bi bi-building text-primary me-2"></i>
             المقاولات والبناء الحديث</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''?>">الرئيسية</a>
                <a href="about.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''?>">من نحن</a>
                <a href="service.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'service.php' ? 'active' : ''?>">الخدمات</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">صفحات</a>
                    <div class="dropdown-menu m-0">
                        <a href="project.php" class="dropdown-item">مشاريعنا</a>
                        <a href="team.php" class="dropdown-item">فريق العمل</a>
                        <a href="testimonial.php" class="dropdown-item">آراء العملاء</a>
                        <a href="blog.php" class="dropdown-item">المدونة</a>
                        <a href="detail.php" class="dropdown-item">تفاصيل المدونة</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''?>">اتصل بنا</a>

                         <?php if (isset($_SESSION['uemail'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#"  data-bs-toggle="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">حسابي</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"> <a class="dropdown-item" href="profile.php">الملف الشخصي</a> </li>
                                        <li class="nav-item"> <a class="dropdown-item" href="my_orders.php">طلباتي  </a> </li>
                                        <!-- <li class="nav-item"> <a class="nav-link" href="feature.php">عقارك</a> </li> -->
                                        <li class="nav-item"> <a class="dropdown-item" href="logout.php">تسجيل الخروج</a> </li>
                                    </ul>
                                </li>
                                <?php } else { ?>
                                <li class="nav-item"> <a class="nav-link" href="login.php">تسجيل الدخول/التسجيل</a> </li>
                                <?php } ?>

            </div>
        </div>
    </nav>
</div>
<!-- نهاية شريط التنقل -->

