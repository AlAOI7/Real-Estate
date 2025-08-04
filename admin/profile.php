 <?php include("header.php");?>
<?php

require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
			<!-- Header -->
           
			<!-- /Header -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">الملف الشخصي</h3>
						
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
    <?php
    $id = $_SESSION['auser'];
    $sql = "select * from admin where auser='$id'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="col-md-12">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto profile-image">
                    <a href="#">
                        <img class="rounded-circle" alt="صورة المستخدم" src="assets/img/profiles/avatar-01.png">
                    </a>
                </div>
                <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-2 text-uppercase"><?php echo $row['1']; ?></h4>
                    <h6 class="text-muted"><?php echo $row['2']; ?></h6>
                    <div class="user-Location">
                        <i class="fa fa-id-badge" aria-hidden="true"></i>
                        <?php echo $row['4']; ?>
                    </div>
                    <div class="about-text"></div>
                </div>
            </div>
        </div>

        <div class="profile-menu">
            <ul class="nav nav-tabs nav-tabs-solid">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">حول</a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password_tab">كلمة المرور</a>
                </li>
                -->
            </ul>
        </div>

        <div class="tab-content profile-tab-cont">
            <!-- تبويب التفاصيل الشخصية -->
            <div class="tab-pane fade show active" id="per_details_tab">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">الاسم</p>
                                    <p class="col-sm-9"><?php echo $row['1']; ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">تاريخ الميلاد</p>
                                    <p class="col-sm-9"><?php echo $row['4']; ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">البريد الإلكتروني</p>
                                    <p class="col-sm-9"><a href="#"><?php echo $row['2']; ?></a></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">رقم الهاتف</p>
                                    <p class="col-sm-9"><?php echo $row['5']; ?></p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-3 text-muted text-sm-right mb-0">العنوان</p>
                                    <p class="col-sm-9 mb-0">
                                        4663 شارع الزراعة،<br>
                                        ميامي،<br>
                                        غوجارات - 33165،<br>
                                        الهند.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <!-- حالة الحساب -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between">
                                    <span>حالة الحساب</span>
                                </h5>
                                <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> نشط</button>
                            </div>
                        </div>

                        <!-- المهارات -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between">
                                    <span>المهارات</span>
                                </h5>
                                <div class="skill-tags">
                                    <span>HTML5</span>
                                    <span>CSS3</span>
                                    <span>Bootstrap</span>
                                    <span>Javascript</span>
                                    <span>Jquery</span>
                                    <span>PHP</span>
                                    <span>MySQL</span>
                                    <span>ASP</span>
                                </div>
                            </div>
                        </div>
                        <!-- /المهارات -->
                    </div>
                </div>
            </div>
            <!-- /تبويب التفاصيل الشخصية -->
        </div>
    </div>
    <?php } ?>
</div>

					
			</div>
			<!-- /Page Wrapper -->

		<!-- /Main Wrapper -->
		 <?php include("footer.php");?>