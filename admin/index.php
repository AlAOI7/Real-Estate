<?php 
	session_start();
	include("config.php");
	$error="";
	if(isset($_POST['login']))
	{
		$user=$_REQUEST['user'];
		$pass=$_REQUEST['pass'];
		
		if(!empty($user) && !empty($pass))
		{
			$query = "SELECT auser, apass FROM admin WHERE auser='$user' AND apass='$pass'";
			$result = mysqli_query($con,$query)or die(mysqli_error());
			$num_row = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			if( $num_row ==1 )
			{
				$_SESSION['auser']=$user;
				header("Location: dashboard.php");
			}
			else
			{
				$error='* Invalid User Name and Password';
			}
		}else{
			$error="* Please Fill all the Fileds!";
		}
		
	}   
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>المقاولات والبناء الحديث</title>
		
		<!-- Favicon -->
       <link href="img/favicon.ico" rel="icon">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
       <div class="page-wrappers login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>تسجيل الدخول</h1>
                        <p class="account-subtitle">الوصول إلى لوحة التحكم لدينا</p>
                        <p style="color:red;"><?php echo $error; ?></p>
                        <!-- النموذج -->
                        <form method="post">
                            <div class="form-group">
                                <input class="form-control" name="user" type="text" placeholder="اسم المستخدم">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="pass" placeholder="كلمة المرور">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" name="login" type="submit">تسجيل الدخول</button>
                            </div>
                        </form>
                        
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">أو</span>
                        </div>
                        
                        <!-- تسجيل الدخول الاجتماعي -->
                        <div class="social-login">
                            <span>تسجيل الدخول باستخدام</span>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google"><i class="fa fa-google"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                        <!-- /تسجيل الدخول الاجتماعي -->
                        
                        <div class="text-center dont-have">ليس لديك حساب؟ <a href="register.php">سجل الآن</a></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>