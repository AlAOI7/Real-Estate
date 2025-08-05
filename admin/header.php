<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>  
<!DOCTYPE html>
<html lang="en" dir="rtl">
<?php
$query = mysqli_query($con, "SELECT * FROM settings LIMIT 1");
$settings = mysqli_fetch_assoc($query);
?>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title><?php echo $settings['site_title']; ?></title>
		
		
        <!-- <link rel="shortcut icon" type="upload/Aicon.png" href="upload/Aicon.png"> -->
<link rel="shortcut icon" type="upload/png" href="<?php echo $settings['favicon']; ?>">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		 <link href="img/favicon.ico" rel="icon">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
	   <style>


            body {
                direction: rtl;
                text-align: right;
            }

                    /* الهيدر */
                .header {
                    width: 100%;

                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 10px 15px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    position: fixed;
                    top: 0;
                    right: 0;
                    left: 0;
                    z-index: 1000;
                }

                /* تخفي الشعار الكبير على الجوال */
                .logo {
                    display: inline-block;
                }

                .logo-small {
                    display: none;
                }

                @media (max-width: 768px) {
                    .logo {
                        display: none;
                    }

                    .logo-small {
                        display: inline-block;
                    }

                    .user-menu {
                        flex-direction: column;
                        align-items: flex-end;
                    }

                    .nav.user-menu h4 {
                        font-size: 14px;
                        margin: 5px 0;
                    }
                }



                /* الشريط الجانبي */
                .sidebar {
                    width: 200px;
                    background: #002950;
                    position: fixed;
                    top: 60px;
                    bottom: 0;
                    right: 0;
                    overflow-y: auto;
                    z-index: 999;
                    transition: transform 0.3s ease-in-out;
                }

                /* الوضع الطبيعي للكمبيوتر */
                .sidebar.open {
                    transform: translateX(0);
                }

                /* مغلق على الجوال */
                .sidebar.closed {
                    transform: translateX(100%);
                }

                /* الجوال */
                @media (max-width: 768px) {
                    .sidebar {
                        transform: translateX(100%); /* مغلق افتراضيًا */
                    }

                    .sidebar.open {
                        transform: translateX(0);
                    }

                    .main-wrapper {
                        padding-right: 0 !important;
                    }
                }

                                /* القيم الأساسية (تظهر في الشاشات الكبيرة فقط) */
                    .page-wrapper {
                        margin-right: 250px;
                        margin-left: 0;
                    }

                    .sidebar .submenu ul {
                        padding-right: 15px;
                        padding-left: 0;
                    }

                    /* عند الشاشات الصغيرة (أقل من 768px)، تلغى هذه القيم */
                    @media (max-width: 767.98px) {
                        .page-wrapper {
                            margin-right: 0;
                        }

                        .sidebar .submenu ul {
                            padding-right: 0;
                        }
                    }


            .user-menu {
                margin-left: auto;
                margin-right: 20px;
            }

            .add-button {
                display: inline-block;
                margin-bottom: 15px;
                padding: 10px 20px;
                background-color: #fae903ff;
                color: #000;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
            }

            .add-button:hover {
                background-color: #fae903ff;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                direction: rtl;
                font-family: 'Tahoma', sans-serif;
            }

            th, td {
                padding: 12px;
                text-align: center;
                border: 1px solid #ddd;
            }

            th {
                background-color: #f8f9fa;
                font-weight: bold;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            .action-buttons a {
                margin: 0 5px;
                padding: 6px 10px;
                text-decoration: none;
                border-radius: 4px;
                font-size: 14px;
                color: white;
            }

            .edit-btn {
                background-color: #007bff;
            }

            .edit-btn:hover {
                background-color: #0069d9;
            }

            .delete-btn {
                background-color: #dc3545;
            }

            .delete-btn:hover {
                background-color: #c82333;
            }

            img {
                border-radius: 5px;
            }
            a {
                    text-decoration: none;
                }
</style>
    </head>
    <body class="p-4">

 
<style>
    .form-container {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        font-family: 'Tahoma', sans-serif;
        direction: rtl;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-container input[type="text"],
    .form-container input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    .form-container button {
        padding: 10px 25px;
        background-color: #fae903ff;
        color: #000;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-container button:hover {
        background-color: #fae903ff;
    }
</style>
  	<!-- تقديم العقار -->
<div class="header">
      <a href="index.php" class="navbar-brand">
            <h5 class=" text-white"> <?php echo $settings['site_title']; ?></h5>
        </a>
    <!-- الشعار -->
    <div class="header-left">
        <a href="dashboard.php" class="logo">
            <!-- <img src="assets/img/logo.png" alt="الشعار"> -->
        </a>
        <a href="dashboard.php" class="logo logo-small">
            <!-- <img src="assets/img/logo-small.png" alt="الشعار" width="30" height="30"> -->
        </a>
    </div>
    <!-- /الشعار -->
    
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    
    <!-- زر القائمة الجوالة -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /زر القائمة الجوالة -->
    
    <!-- قائمة رأس الصفحة اليمنى -->
    <ul class="nav user-menu">
        
        <!-- قائمة المستخدم -->
        <h4 style="color:white;margin-top:13px;text-transform:capitalize;"><?php echo $_SESSION['auser']; ?></h4>
        <li class="nav-item dropdown app-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt="  المقاولات والبناء الحديث"></span>
            </a>
            
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="assets/img/profiles/avatar-01.png" alt="صورة المستخدم" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6><?php echo $_SESSION['auser']; ?></h6>
                        <p class="text-muted mb-0">المسؤول</p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.php">الملف الشخصي</a>
                <a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
            </div>
        </li>

        <!-- /قائمة المستخدم -->
        
    </ul>
    <!-- /قائمة رأس الصفحة اليمنى -->
    
</div>

<!-- رأس الصفحة -->

<!-- الشريط الجانبي -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
           <ul>
    <li class="menu-title"> 
        <span> <?php echo $settings['site_title']; ?></span>
    </li>
    <li> 
        <a href="dashboard.php"><i class="fe fe-home"></i> &nbsp;&nbsp;&nbsp;<span>لوحة التحكم</span></a>
    </li>

    <li class="menu-title"> 
        <span>المستخدمون</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fe fe-users"></i>&nbsp;&nbsp;&nbsp;<span> المستخدمون </span></a>
        <ul style="display: none;">
            <li><a href="adminlist.php"> المسؤولون </a></li>
            <li><a href="userlist.php"> المستخدمون </a></li>
            <li><a href="useragent.php"> الوكلاء </a></li>
            <li><a href="userbuilder.php"> البناؤون </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>المدونه</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fe fe-book"></i>&nbsp;&nbsp;&nbsp;<span> المدونة</span></a>
        <ul style="display: none;">
            <li><a href="blog_create.php"> إضافة </a></li>
            <li><a href="blog_list.php"> عرض </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>الفئات</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fe fe-layer"></i>&nbsp;&nbsp;&nbsp;<span> الفئات</span></a>
        <ul style="display: none;">
            <li><a href="category_add.php"> إضافة </a></li>
            <li><a href="categories.php"> عرض </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>التعليقات</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fe fe-comments"></i>&nbsp;&nbsp;&nbsp;<span> التعليقات</span></a>
        <ul style="display: none;">
            <li><a href="admin_comments.php"> عرض </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>الخدمات</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;<span> الخدمات</span></a>
        <ul style="display: none;">
            <li><a href="service_create.php"> إضافة </a></li>
            <li><a href="services.php"> عرض </a></li>
        </ul>
    </li>
 <li class="menu-title"> 
        <span>ألاعدادات</span>
    </li>
 <li >
        <a href="edit_settings.php"><i class="fa  fa-cog"></i>&nbsp;&nbsp;&nbsp;<span> الاعدادات</span></a>
  
    </li>
    <li class="menu-title"> 
        <span>تقييمات</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fe fe-star"></i>&nbsp;&nbsp;&nbsp;<span> تقييمات</span></a>
        <ul style="display: none;">
            <li><a href="reviewscreate.php"> إضافة </a></li>
            <li><a href="reviewsindex.php"> عرض </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>الشرائح</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-file-text"></i>&nbsp;&nbsp;&nbsp;<span> الشرائح</span></a>
        <ul style="display: none;">
            <li><a href="createsliders.php"> إضافة </a></li>
            <li><a href="indexsliders.php"> عرض </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>المشاريع</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-project-diagram"></i>&nbsp;&nbsp;&nbsp;<span> المشاريع</span></a>
        <ul style="display: none;">
            <li><a href="project_add.php"> إضافة </a></li>
            <li><a href="projects.php"> عرض </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>الاستفسارات</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;&nbsp;<span> الاستفسارات </span></a>
        <ul style="display: none;">
            <li><a href="contactview.php"> الاتصالات </a></li>
        </ul>
    </li>

    <li class="menu-title"> 
        <span>حول</span>
    </li>
    <li class="submenu">
        <a href="#"><i class="fe fe-info"></i>&nbsp;&nbsp;&nbsp;<span> حول </span></a>
        <ul style="display: none;">
            <li><a href="aboutadd.php"> حول </a></li>
            <li><a href="aboutview.php"> عرض حول </a></li>
        </ul>
    </li>
</ul>

        </div>
    </div>
</div>
<!-- /الشريط الجانبي -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var mobileBtn = document.getElementById("mobile_btn");
        var sidebar = document.getElementById("sidebar");

        mobileBtn.addEventListener("click", function() {
            sidebar.classList.toggle("open");
        });
    });
</script>


