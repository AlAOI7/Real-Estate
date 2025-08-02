<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>  
  	<!-- تقديم العقار -->
<div class="header">
    
    <!-- الشعار -->
    <div class="header-left">
        <a href="dashboard.php" class="logo">
            <img src="assets/img/logo.png" alt="الشعار">
        </a>
        <a href="dashboard.php" class="logo logo-small">
            <img src="assets/img/logo-small.png" alt="الشعار" width="30" height="30">
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
                <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt="رايان تايلور"></span>
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
                    <span>الرئيسية</span>
                </li>
                <li> 
                    <a href="dashboard.php"><i class="fe fe-home"></i> <span>لوحة التحكم</span></a>
                </li>
                
                <li class="menu-title"> 
                    <span>المصادقة</span>
                </li>
            
                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> المصادقة </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="index.php"> تسجيل الدخول </a></li>
                        <li><a href="register.php"> تسجيل </a></li>
                    </ul>
                </li>
                <li class="menu-title"> 
                    <span>المستخدمون</span>
                </li>
            
                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> المستخدمون </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="adminlist.php"> المسؤولون </a></li>
                        <li><a href="userlist.php"> المستخدمون </a></li>
                        <li><a href="useragent.php"> الوكلاء </a></li>
                        <li><a href="userbuilder.php"> البناؤون </a></li>
                    </ul>
                </li>
            
                <li class="menu-title"> 
                    <span>العقار</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> العقار </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="propertyadd.php"> إضافة عقار</a></li>
                        <li><a href="propertyview.php"> عرض العقار </a></li>
                    </ul>
                </li>
                
                <li class="menu-title"> 
                    <span>الولاية والمدينة</span>
                </li>
            
                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span>الولاية والمدينة</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="stateadd.php"> الولاية </a></li>
                        <li><a href="cityadd.php"> المدينة </a></li>
                    </ul>
                </li>
                
                <li class="menu-title"> 
                    <span>الاستفسارات</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> الاستفسارات </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="contactview.php"> الاتصالات </a></li>
                        <li><a href="feedbackview.php"> الملاحظات </a></li>
                    </ul>
                </li>
                <li class="menu-title"> 
                    <span>حول</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> حول </span> <span class="menu-arrow"></span></a>
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