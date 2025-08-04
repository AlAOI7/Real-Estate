<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
								
?>

<!--	Page Loader  -->
<!--<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>  -->
<!--	Page Loader  -->

        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
	<!-- بدء الشعار -->


   <!-- بداية السلايدر -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      
              <div class="carousel-inner">
            <?php
            $query = mysqli_query($con, "SELECT * FROM sliders ORDER BY id ASC");
            $first = true;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <div class="carousel-item <?= $first ? 'active' : '' ?>">
               <img class="w-100" src="admin/uploads/<?= htmlspecialchars($row['image']) ?>" alt="صورة" >

                <!-- <img class="w-100" src="img/carousel-2.jpg" alt="صورة"> -->

                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-2 text-uppercase text-white mb-md-4"><?= htmlspecialchars($row['title']) ?></h1>
                        <?php if ($row['button_text']) : ?>
                            <a href="<?= htmlspecialchars($row['button_link']) ?>" class="btn bg-primary py-md-3 px-md-5 mt-2"><?= htmlspecialchars($row['button_text']) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $first = false; } ?>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">السابق</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">التالي</span>
            </button>
        </div>
    </div>
    <!-- نهاية السلايدر -->

  <!-- About Start -->
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
                    <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="admin/upload/<?php echo $row['3'];?>" style="object-fit: cover;" alt="صورة عن الشركة">
                </div>
            </div>

          

        </div>
        	<?php } ?>
    </div>
    <!-- نهاية قسم عن الشركة -->
       
    <!-- بداية قسم الخدمات -->
        <div class="container-fluid bg-light py-6 ps-5 pe-0">
                <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                    <h1 class="display-5 text-uppercase mb-4">نقدم <span class="text-primary">أفضل</span> خدمات البناء</h1>
                </div>
                <?php

                        // استعلام لجلب كل الخدمات
                        $sql = "SELECT * FROM services";
                        $result = $con->query($sql);
                        ?>

                        <div class="row">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center p-3">
                                        <img class="img-fluid mb-3" src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                                        <div class="service-icon bg-white mb-3">
                                            <i class="fa fa-3x <?php echo htmlspecialchars($row['icon_class']); ?> text-primary"></i>
                                        </div>
                                        <div class="px-4 pb-4">
                                            <h4 class="text-uppercase mb-3">
                                                <a href="<?php echo htmlspecialchars($row['details_url']); ?>" style="text-decoration:none; color:inherit;">
                                                    <?php echo htmlspecialchars($row['name']); ?>
                                                </a>
                                            </h4>
                                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                                            <div>
                                                <a class="btn" href="<?php echo htmlspecialchars($row['details_url']); ?>">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                                    <i class="fas fa-phone"> اطلب الان</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>لا توجد خدمات حالياً.</p>";
                        }
                    
                        ?>
                        </div>

            <!-- <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/a.jpg" alt="بناء عظم">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-building text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">بناء عظم</h4>
                            <p>نقدم خدمات بناء العظم بأعلى معايير الجودة والإتقان، باستخدام أفضل المواد لضمان متانة الهيكل.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/b.jpg" alt="تصميم أحواش">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-tree text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">تصميم أحواش</h4>
                            <p>تصاميم مبتكرة لأحواش المنازل والفلل، تجمع بين الجمال والوظائف العملية لتلبية احتياجاتك.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/c.jpg" alt="بناء فلل">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-home text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">بناء فلل</h4>
                            <p>بناء فلل فاخرة بتصاميم عصرية وكلاسيكية، مع الحرص على تحقيق أعلى مستويات الجودة والرفاهية.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/d.jpg" alt="ترميم مباني">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-hammer text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">ترميم مباني</h4>
                            <p>ترميم وإعادة تأهيل المباني القديمة والتراثية، مع الحفاظ على الهوية المعمارية والقيمة التاريخية.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/e.jpg" alt="تشطيب مباني">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-paint-roller text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">تشطيب مباني</h4>
                            <p>تشطيبات داخلية وخارجية عالية الجودة، تحويل المساحات إلى أماكن عصرية وجذابة تلبي تطلعاتك.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/f.jpg" alt="بناء هناجر">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-warehouse text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">بناء هناجر</h4>
                            <p>تصميم وإنشاء هناجر ومستودعات صناعية وتجارية، بمواصفات عالية الجودة والمتانة لتلبية احتياجات التخزين.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/h.jpg" alt="تركيب سواتر">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-shield-alt text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">تركيب سواتر</h4>
                            <p>تصميم وتركيب سواتر متنوعة لحماية المنازل والحدائق، وتوفير الخصوصية والأمان.</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/2.jpeg" alt="بناء المنشآت">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-building text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">بناء المنشآت</h4>
                            <p>نقدم حلولاً متكاملة لبناء المنشآت السكنية والتجارية بأعلى معايير الجودة والسلامة</p>
                            <div>
                                <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                                <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/3.jpeg" alt="تجديد المنازل">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-home text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">تجديد المنازل</h4>
                            <p>خدمات متكاملة لتجديد وتطوير المنازل القديمة مع الحفاظ على الهوية المعمارية</p>
                            <div>
                            <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                            <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/6.jpeg" alt="التصميم المعماري">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-drafting-compass text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">التصميم المعماري</h4>
                            <p>تصاميم مبتكرة تلبي احتياجاتك مع مراعاة الجوانب الجمالية والوظيفية</p>
                            <div>
                            <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                            <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/5.jpeg" alt="التصميم الداخلي">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-palette text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">التصميم الداخلي</h4>
                            <p>تحويل المساحات إلى لوحات فنية تعكس ذوقك وتلبي احتياجاتك الوظيفية</p>
                            <div>
                            <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                            <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/9.jpeg" alt="الصيانة والدعم">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-tools text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">الصيانة والدعم</h4>
                            <p>خدمات صيانة شاملة مع ضمان الجودة واستجابة سريعة لجميع احتياجاتك</p>
                            <div>
                            <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                            <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                        <img class="img-fluid" src="img/10.jpeg" alt="أعمال الدهان">
                        <div class="service-icon bg-white">
                            <i class="fa fa-3x fa-paint-brush text-primary"></i>
                        </div>
                        <div class="px-4 pb-4">
                            <h4 class="text-uppercase mb-3">أعمال الدهان</h4>
                            <p>تنفيذ أعمال الدهان باحترافية باستخدام أفضل المواد وأحدث التقنيات</p>
                            <div>
                            <a class="btn " href="">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
                            <a href="tel:+967773748697" class="btn bg-primary ms-2" title="اتصال">
                                    <i class="fas fa-phone"> اطلب الان</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
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
                                        <img src="<?php echo htmlspecialchars($cat['image']); ?>" style="width: 150px; height: 100px;">
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

    <style>
        .rating {
            color: #FFD700; /* لون النجوم */
        }
        .testimonial {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .testimonial {
                padding: 20px;
            }
            .display-5 {
                font-size: 1.5rem; /* تقليل حجم الخط في الشاشات الصغيرة */
            }
        }
    </style>
    <div class="container-fluid bg-light py-6 px-4">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">آراء <span class="text-primary">عملائنا السعداء</span></h1>
        </div>
        <div class="row gx-0 align-items-center">
            <div class="col-lg-9 mx-auto">
                <div class="testimonial bg-light">
                    <div class="mb-4">
                        <h5>عميل 1:</h5>
                        <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i> كانت تجربتي رائعة! الجودة عالية والخدمة ممتازة.</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span>(4.5 من 5)</span>
                    </div>
                    <div class="mb-4">
                        <h5>عميل 2:</h5>
                        <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i> فريق محترف للغاية ونتائج فوق التوقعات. أنصح بالتعامل معهم.</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <span>(5 من 5)</span>
                    </div>
                    <div class="mb-4">
                        <h5>عميل 3:</h5>
                        <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i> تجربة مدهشة! سأعود بالتأكيد لمزيد من المشاريع في المستقبل.</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span>(4 من 5)</span>
                    </div>
                    <div class="mb-4">
                        <h5>عميل 4:</h5>
                        <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i> خدمة عملاء ممتازة واهتمام بالتفاصيل. شكراً لكم!</p>
                        <span class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <span>(5 من 5)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

       <style>
        .rating {
            color: #FFD700; /* لون النجوم */
        }
        .progress {
            height: 20px;
        }
        .testimonial {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .testimonial {
                padding: 20px;
            }
            .display-5 {
                font-size: 1.5rem; /* تقليل حجم الخط في الشاشات الصغيرة */
            }
        }
    </style>
  <!-- بداية قسم الشهادات -->

    

  <?php

    // جلب أول تقييم (أو يمكنك استخدام LIMIT أو WHERE إذا أردت التحكم)
    $result = $con->query("SELECT * FROM reviews ORDER BY id DESC LIMIT 1");
    $review = $result->fetch_assoc();
    ?>

    <div class="container-fluid bg-light py-6 px-4">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">تقييماتنا</h1>
        </div>
        <div class="row gx-0 align-items-center">
            <div class="col-lg-9 mx-auto">
                <div class="testimonial bg-light">
                    <h4 class="text-uppercase mb-4">نظرة عامة على الأداء</h4>

                    <div class="mb-4">
                        <h5>سنوات الخبرة: <span class="font-weight-bold"><?= $review['experience_years'] ?> سنوات</span></h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $review['experience_percent'] ?>%;">
                                <?= $review['experience_percent'] ?>%
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>عدد المشاريع المنفذة: <span class="font-weight-bold"><?= $review['projects_count'] ?> مشروع</span></h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $review['projects_percent'] ?>%;">
                                <?= $review['projects_percent'] ?>%
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>عدد العملاء السعداء: <span class="font-weight-bold"><?= $review['clients_count'] ?> عميل</span></h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $review['clients_percent'] ?>%;">
                                <?= $review['clients_percent'] ?>%
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>تقييم العملاء:</h5>
                        <span class="rating">
                            <?php
                            $fullStars = floor($review['overall_rating']);
                            $halfStar = ($review['overall_rating'] - $fullStars) >= 0.5;
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            if ($halfStar) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            }
                            ?>
                        </span>
                        <span>(<?= $review['overall_rating'] ?> من 5)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- نهاية قسم الشهادات -->

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
  
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
 