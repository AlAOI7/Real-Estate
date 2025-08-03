<?php 
session_start();
include("config.php");
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
			   
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uemail']=$email;
				header("location:index.php");
				
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Login Not Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>

        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
     
		 <style>
/* ضبط كامل الصفحة */
.page-wrappers.login-body {
    min-height: 100vh;
    background-color: #f0f0f0; /* لون خلفية رمادي فاتح */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* حاوية تسجيل الدخول */
.login-wrapper {
    max-width: 450px;
    width: 100%;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    padding: 40px 30px;
}

/* عنوان الصفحة */
.login-right-wrap h1 {
    font-size: 28px;
    margin-bottom: 10px;
    color: #333;
    text-align: center;
}

/* النص الفرعي */
.account-subtitle {
    text-align: center;
    color: #777;
    font-size: 14px;
    margin-bottom: 30px;
}

/* رسالة الخطأ والرسائل */
.error, .msg {
    display: block;
    text-align: center;
    margin-bottom: 15px;
    font-weight: 600;
}

.error {
    color: #e74c3c; /* أحمر */
}

.msg {
    color: #27ae60; /* أخضر */
}

/* حقول الإدخال */
.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1.5px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
}

/* زر التسجيل */
.btn-primary {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    border: none;
    font-size: 18px;
    font-weight: 600;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* خط الفصل */
.login-or {
    position: relative;
    margin: 30px 0;
    text-align: center;
}

.or-line {
    height: 1px;
    background: #ccc;
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
}

.span-or {
    position: relative;
    background: #fff;
    padding: 0 15px;
    color: #777;
    font-weight: 600;
}

/* روابط التسجيل الاجتماعي */
.social-login {
    text-align: center;
    margin-bottom: 25px;
    font-size: 14px;
    color: #555;
}

.social-login span {
    display: block;
    margin-bottom: 12px;
    font-weight: 600;
}

.social-login a {
    display: inline-block;
    margin: 0 8px;
    font-size: 20px;
    color: #555;
    transition: color 0.3s ease;
}

.social-login a.facebook:hover {
    color: #3b5998;
}

.social-login a.google:hover {
    color: #db4437;
}

.social-login a.facebook:nth-child(3):hover { /* تويتر */
    color: #1da1f2;
}

.social-login a.google:nth-child(5):hover { /* انستغرام */
    color: #e1306c;
}

/* نص تسجيل الحساب */
.dont-have {
    text-align: center;
    font-size: 14px;
    color: #666;
}

.dont-have a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
}

.dont-have a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 480px) {
    .login-wrapper {
        padding: 30px 20px;
    }
}

            </style>
		 
<div class="page-wrappers login-body full-row bg-gray">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>تسجيل الدخول</h1>
                        <p class="account-subtitle">الوصول إلى لوحة التحكم الخاصة بنا</p>
                        <?php echo $error; ?><?php echo $msg; ?>
                        <!-- نموذج -->
                        <form method="post">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="بريدك الإلكتروني*">
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="كلمتك السرية">
                            </div>
                            
                            <button class="btn btn-primary" name="login" value="Login" type="submit">تسجيل الدخول</button>
                        </form>
                        
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">أو</span>
                        </div>
                        
                        <!-- تسجيل اجتماعي -->
                        <div class="social-login">
                            <span>تسجيل الدخول باستخدام</span>
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="google"><i class="fab fa-google"></i></a>
                            <a href="#" class="facebook"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="google"><i class="fab fa-instagram"></i></a>
                        </div>
                        <!-- /تسجيل اجتماعي -->
                        
                        <div class="text-center dont-have">ليس لديك حساب؟ <a href="register.php">تسجيل</a></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- تسجيل الدخول -->
        
        
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
    