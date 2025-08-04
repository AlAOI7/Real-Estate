<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

////// code
$error='';
$msg='';
if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];

	$content=$_POST['content'];
	
	$uid=$_SESSION['uid'];
	
	if(!empty($name) && !empty($phone) && !empty($content))
	{
		
		$sql="INSERT INTO feedback (uid,fdescription,status) VALUES ('$uid','$content','0')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}								
?>

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
  
		 
		<!--	Submit property   -->
       <div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">الملف الشخصي</h2>
            </div>
        </div>
        <div class="dashboard-personal-info p-5 bg-white">
            <form action="#" method="post">
                <h5 class="text-secondary border-bottom-on-white pb-3 mb-4">نموذج الملاحظات</h5>
                <?php echo $msg; ?><?php echo $error; ?>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="user-id">الاسم</label>
                            <input type="text" name="name" class="form-control" placeholder="أدخل الاسم">
                        </div>                

                        <div class="form-group">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" name="phone" class="form-control" placeholder="أدخل رقم الهاتف" maxlength="10">
                        </div>

                        <div class="form-group">
                            <label for="about-me">الوصف</label>
                            <textarea class="form-control" name="content" rows="7" placeholder="أدخل وصفك أو ملاحظاتك"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary mb-4" name="insert" value="إرسال">
                    </div>
            </form>
            <div class="col-lg-1"></div>
            <div class="col-lg-5 col-md-12">
                <?php 
                    $uid = $_SESSION['uid'];
                    $query = mysqli_query($con, "SELECT * FROM `user` WHERE uid='$uid'");
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="user-info mt-md-50">
                    <img src="admin/user/<?php echo $row['6']; ?>" alt="صورة المستخدم">
                    <div class="mb-4 mt-3">
                    </div>

                    <div class="font-18">
                        <div class="mb-1 text-capitalize"><b>الاسم:</b> <?php echo $row['1']; ?></div>
                        <div class="mb-1 text-capitalize"><b>البريد الإلكتروني:</b> <?php echo $row['2']; ?></div>
                        <div class="mb-1 text-capitalize"><b>الهاتف:</b> <?php echo $row['3']; ?></div>
                        <div class="mb-1 text-capitalize"><b>الدور:</b> <?php echo $row['5']; ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>            
</div>

	<!--	Submit property   -->
        
        
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
<script src="js/custom.js"></script>
</body>
</html>