<?php include("header.php"); ?>
<?php 

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
if(isset($_POST['update']))
{
	$aid = $_GET['id'];
	$title=$_POST['utitle'];
	$content=$_POST['ucontent'];
	
	$aimage=$_FILES['aimage']['name'];
	
	$temp_name1 = $_FILES['aimage']['tmp_name'];


	move_uploaded_file($temp_name1,"upload/$aimage");
	
	$sql = "UPDATE about SET title = '{$title}' , content = '{$content}', image ='{$aimage}' WHERE id = {$aid}";
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>About Updated</p>";
		header("Location:aboutview.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>About Not Updated</p>";
		header("Location:aboutview.php?msg=$msg");
	}
}
?>
 

			<!-- Header -->
			
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<div class="content container-fluid">

				
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h2 class="card-title">من نحن</h2>
								</div>
								<?php 
								$aid = $_GET['id'];
								$sql = "SELECT * FROM about where id = {$aid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<h5 class="card-title">من نحن </h5>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">العنوان</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="utitle" value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">المحتوى</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="ucontent" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">الصوره</label>
													<div class="col-lg-9">
														<img src="upload/<?php echo $row['3']; ?>" height="200px" width="200px"><br><br>
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
											</div>
										</div>
										<div class="text-left">
											<input type="submit" class="btn btn-primary"  value="تعديل" name="update" style="margin-left:200px;">
										</div>
									</form>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			<!-- /Page Wrapper -->
		<!-- /Main Wrapper -->
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
    </body>

<!-- Mirrored from dreamguys.co.in/demo/ventura/form-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2019 04:41:05 GMT -->
</html>