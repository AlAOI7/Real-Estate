<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");								
?>
	<?php include("include/header.php");?>
<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
	
        <!--	Header end  -->
        
   
         <!--	Banner   --->
		 
        <!--	About Our Company -->
        <!-- About Start -->
     <!-- بداية قسم عن الشركة -->
    <div class="container-fluid py-6 ps-5 pe-0 ">
    	<?php 
					
					$query=mysqli_query($con,"SELECT * FROM about");
					while($row=mysqli_fetch_array($query))
					{
				?>
        <div class="row g-5">
            <div class="col-lg-7">
                <h1 class="display-5 text-uppercase mb-4">نحن <span class="text-primary">الرائدون</span> في صناعة البناء</h1>
                <h4 class="text-uppercase mb-3 text-body">نسعى دائمًا لتقديم الأفضل، مع التركيز على الجودة والدقة في كل تفصيل</h4>
                <p>
                 <?php echo $row['1'];?>
                نتميز بخبرة واسعة في مجال الإنشاءات، حيث نقدم حلولاً مبتكرة تلبي احتياجات عملائنا. فريقنا من الخبراء يعمل بدقة وإتقان لضمان تنفيذ المشاريع في الوقت المحدد وبأعلى معايير الجدوة التحول نحو البناء الحديث مع الحفاظ على الهوية المعمارية.</p>
                <div class="row gx-5 py-2">
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>التخطيط المثالي</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>عمالة محترفة</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i> الطلب على الترميم للمباني القديمة</p>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>مواد بناء عالية الجودة</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>التزام بالمواعيد</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>المشاريع السياحية الكبرى قيد التطوير</p>
                    </div>
                </div>
                <p class="mb-4">
                <?php echo $row['2'];?>
                نسعى جاهدين لتحقيق رضا العملاء من خلال تقديم خدمات متكاملة تغطي جميع جوانب المشروع، بدءًا من التصميم وحتى التسليم النهائي.</p>
                <img src="img/signature.jpg" alt="توقيع">
        </div>
            <div class="col-lg-5 pb-5" style="min-height: 400px;">
                <div class="position-relative bg-dark-radial h-100 ms-5">
                    <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="admin/uploads/<?php echo $row['3'];?>" style="object-fit: cover;" alt="صورة عن الشركة">
                </div>
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
        </div>
        	<?php } ?>
    </div>
    <!-- نهاية قسم عن الشركة -->
        <!--	About Our Company -->        
        
       <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>
</body>

</html>