    <?php include("include/header.php");?>
<?php 

include("config.php");
								
?>  
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
                $con->close();
                ?>
                </div>


</div>
<!-- بداية قسم الخدمات -->
    <!-- <div class="container-fluid bg-light py-6 ps-5 pe-0">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">نقدم <span class="text-primary">أفضل</span> خدمات البناء</h1>
        </div>
     <div class="row g-5">
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
    </div>
    </div> -->
    <!-- نهاية قسم الخدمات -->


<?php include("include/footer.php");?>