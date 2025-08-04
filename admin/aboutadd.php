	<?php include("header.php"); ?>
<?php 

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// add code
$error="";
$msg="";
if(isset($_POST['addabout']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$aimage=$_FILES['aimage']['name'];
	
	$temp_name1 = $_FILES['aimage']['tmp_name'];


	move_uploaded_file($temp_name1,"upload/$aimage");
	
	$sql="insert into about (title,content,image) values('$title','$content','$aimage')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>* Not Inserted Some Error</p>";
		}
}
?>
 

		<!-- Main Wrapper -->
		
			<!-- Header -->
		
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<div class="content container-fluid">

				<!-- رأس الصفحة -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">حول</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">لوحة التحكم</a></li>
                <li class="breadcrumb-item active">حول</li>
            </ul>
        </div>
    </div>
</div>
<!-- /رأس الصفحة -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">من نحن</h2>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <h5 class="card-title">من نحن</h5>
                            <?php echo $error; ?>
                            <?php echo $msg; ?>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">العنوان</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="title" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">الصورة</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage" type="file" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">المحتوى</label>
                                <div class="col-lg-9">
                                    <textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <input type="submit" class="btn btn-primary" value="تقديم" name="addabout" style="margin-left:200px;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
					
					
				</div>
			</div>
			<?php include("footer.php"); ?>