<?php
include 'config.php';

// استعلام للحصول على عدد المشاريع فقط
$query = "SELECT COUNT(*) as total_projects FROM projects";
$result = mysqli_query($con, $query);

$total_projects = 0;
if ($result) {
	$row = mysqli_fetch_assoc($result);
	$total_projects = $row['total_projects'];
}

$result = mysqli_query($con, "SELECT COUNT(*) as total_services FROM services");
$total_services = 0;

if ($result) {
	$row = mysqli_fetch_assoc($result);
	$total_services = $row['total_services'];
}
// استعلام لحساب عدد المستخدمين الكلي
$query = "SELECT COUNT(*) as total_users FROM user";
$res = mysqli_query($con, $query);

$total_users = 0;
if ($res) {
	$row = mysqli_fetch_assoc($res);
	$total_users = $row['total_users'];
}
$query = "SELECT COUNT(*) as total_contacts FROM contact";
$result = mysqli_query($con, $query);

$total_contacts = 0;
if ($result) {
	$row = mysqli_fetch_assoc($result);
	$total_contacts = $row['total_contacts'];
}
?>

<!-- Main Wrapper -->

<!-- Header -->
<?php include("header.php"); ?>
<!-- /Header -->
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- رأس الصفحة -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">مرحباً بك، المدير!</h3>
					<p></p>
					<ul class="breadcrumb">
						<li class="breadcrumb-item active">لوحة التحكم</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /رأس الصفحة -->

		<div class="row">
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-primary">
								<i class="fe fe-users"></i>
							</span>
						</div>
						<div class="dash-widget-info">
							<h3><?php echo $total_users; ?></h3>
							<h6 class="text-muted">المستخدمين</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-primary w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-success">
								<i class="fe fe-users"></i>
							</span>
						</div>
						<div class="dash-widget-info">
							<h3><?php echo $total_projects; ?></h3>
							<h6 class="text-muted">عدد المشاريع</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-success w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-danger">
								<i class="fe fe-users"></i>
							</span>
						</div>
						<div class="dash-widget-info">
							<h3><?php echo $total_services; ?></h3>
							<h6 class="text-muted">الخدمات</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-danger w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-warning">
								<i class="fe fe-users"></i>
							</span>
						</div>
						<div class="dash-widget-info">
							<h3><?php echo $total_contacts; ?></h3>
							<h6 class="text-muted">رسائل التواصل</h6>
							<div class="progress progress-sm">
								<div class="progress-bar bg-warning w-50"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
<div class="row">
    <div class="col-md-12">
        <div class="btn-group d-flex flex-wrap" role="group" aria-label="Page Navigation">
            
            <a href="admin_comments.php" class="btn btn-primary m-2 flex-fill">تعليقات الإدارة</a>
            
            <a href="projects.php" class="btn btn-success m-2 flex-fill">المشاريع</a>
            
            <a href="blog_list.php" class="btn btn-info m-2 flex-fill">المدونة</a>
            
            <a href="categories.php" class="btn btn-warning m-2 flex-fill">التصنيفات</a>

              
            <a href="indexsliders.php" class="btn btn-secondary m-2 flex-fill">الشرائح</a>
            
            <a href="orders.php" class="btn btn-danger m-2 flex-fill">الطلبات</a>

        <a href="services.php" class="btn btn-info m-2 flex-fill">الخدمات</a>

            <a href="contactview.php" class="btn btn-dark m-2 flex-fill">رسائل التواصل</a>

        </div>
    </div>
</div>

		<div class="row">
			<!-- مخطط المبيعات -->
			<div class="col-md-12 col-lg-6">
				<div class="card card-chart">
					<div class="card-header">
						<h4 class="card-title">نظرة عامة على المبيعات</h4>
					</div>
					<div class="card-body">
						<div id="morrisArea"></div>
					</div>
				</div>
			</div>
			<!-- /مخطط المبيعات -->

			<!-- مخطط الطلبات -->
			<div class="col-md-12 col-lg-6">
				<div class="card card-chart">
					<div class="card-header">
						<h4 class="card-title">حالة الطلبات</h4>
					</div>
					<div class="card-body">
						<div id="morrisLine"></div>
					</div>
				</div>
			</div>
			<!-- /مخطط الطلبات -->
		</div>
	</div>
</div>

<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/js/chart.morris.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>

</html>