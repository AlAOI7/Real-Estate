<?php
include("config.php");

$error = "";
$msg = "";

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg'])) {
//     // التحقق من reCAPTCHA
//     $recaptcha = $_POST['g-recaptcha-response'] ?? '';
//     $secret = '6Ld6gZcrAAAAAFgE1SV4icUgEVHgrOMPuUGC2G9U';

//     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha");
//     $resData = json_decode($response);

//     if (!$resData || !$resData->success) {
//         $error = "<p class='alert alert-warning'>فشل التحقق من reCAPTCHA. حاول مرة أخرى.</p>";
//     } else {
//         // استلام البيانات
//         $name   = trim($_POST['name']);
//         $email  = trim($_POST['email']);
//         $phone  = trim($_POST['phone']);
//         $pass   = trim($_POST['pass']);
//         $utype  = $_POST['utype'] ?? 'user';

//         $uimage = $_FILES['uimage']['name'];
//         $temp_name1 = $_FILES['uimage']['tmp_name'];

//         // التحقق من البريد
//         $query = "SELECT * FROM user WHERE uemail='$email'";
//         $res = mysqli_query($con, $query);
//         $num = mysqli_num_rows($res);

//         if ($num == 1) {
//             $error = "<p class='alert alert-warning'>البريد الإلكتروني موجود مسبقًا</p>";
//         } else {
//             // التأكد من أن جميع الحقول ممتلئة
//             if (!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage)) {
//                 // تشفير كلمة المرور
//                 $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

//                 // إدخال البيانات
//                 $sql = "INSERT INTO user (uname, uemail, uphone, upass, utype, uimage) 
//                         VALUES ('$name', '$email', '$phone', '$hashed_pass', '$utype', '$uimage')";
//                 $result = mysqli_query($con, $sql);

//                 // رفع الصورة
//                 move_uploaded_file($temp_name1, "admin/user/$uimage");

//                 if ($result) {
//                     // تحويل إلى الصفحة الرئيسية
//                     header("Location: login.php");
//                     exit;
//                 } else {
//                     $error = "<p class='alert alert-warning'>فشل في عملية التسجيل</p>";
//                 }
//             } else {
//                 $error = "<p class='alert alert-warning'>يرجى ملء جميع الحقول</p>";
//             }
//         }
//     }
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg'])) {
    // التحقق من reCAPTCHA
    $recaptcha = $_POST['g-recaptcha-response'] ?? '';
    $secret = '6Ld6gZcrAAAAAFgE1SV4icUgEVHgrOMPuUGC2G9U';

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha");
    $resData = json_decode($response);

    if (!$resData || !$resData->success) {
        $error = "<p class='alert alert-warning'>فشل التحقق من reCAPTCHA. حاول مرة أخرى.</p>";
    } else {
        // استلام البيانات
        $name   = trim($_POST['name']);
        $email  = trim($_POST['email']);
        $phone  = trim($_POST['phone']);
        $pass   = trim($_POST['pass']);
        $utype  = $_POST['utype'] ?? 'user';

        $uimage = $_FILES['uimage']['name'];
        $temp_name1 = $_FILES['uimage']['tmp_name'];

        // التحقق من البريد
        $query = "SELECT * FROM user WHERE uemail='$email'";
        $res = mysqli_query($con, $query);
        $num = mysqli_num_rows($res);

        if ($num == 1) {
            $error = "<p class='alert alert-warning'>البريد الإلكتروني موجود مسبقًا</p>";
        } else {
            // التأكد من أن جميع الحقول ممتلئة
            if (!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage)) {
                // إدخال البيانات بدون تشفير كلمة المرور
                $sql = "INSERT INTO user (uname, uemail, uphone, upass, utype, uimage) 
                        VALUES ('$name', '$email', '$phone', '$pass', '$utype', '$uimage')";
                $result = mysqli_query($con, $sql);

                // رفع الصورة
                move_uploaded_file($temp_name1, "admin/user/$uimage");

                if ($result) {
                    // تحويل إلى الصفحة الرئيسية
                    header("Location: login.php");
                    exit;
                } else {
                    $error = "<p class='alert alert-warning'>فشل في عملية التسجيل</p>";
                }
            } else {
                $error = "<p class='alert alert-warning'>يرجى ملء جميع الحقول</p>";
            }
        }
    }
}
?>

<?php include("include/header.php");?>
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
        	
<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
	
        <!--	Header end  -->
   
		 
		<div class="page-wrappers login-body full-row bg-gray">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>تسجيل</h1>
                        <p class="account-subtitle">الوصول إلى لوحة التحكم الخاصة بنا</p>
                        <?php echo $error; ?><?php echo $msg; ?>
                        <!-- نموذج -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="اسمك*">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="بريدك الإلكتروني*">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="هاتفك*" maxlength="10">
                            </div>
                            <div class="form-group">
                                <input type="text" name="pass" class="form-control" placeholder="كلمتك السرية*">
                            </div>
                        <div class="mb-3">
                                        <div class="g-recaptcha" data-sitekey="6Ld6gZcrAAAAACIEkMMfFd7v-PAt_56JacxBTJis"></div>
                                    </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="utype" value="user" checked>مستخدم
                                </label>
                            </div>
                            <!-- <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="utype" value="agent">وكيل
                                </label>
                            </div>
                            <div class="form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="utype" value="builder">باني
                                </label>
                            </div> -->

                            <div class="form-group">
                                <label class="col-form-label"><b>صورة المستخدم</b></label>
                                <input class="form-control" name="uimage" type="file">
                            </div>

                            <button class="btn btn-primary" name="reg" value="Register" type="submit">تسجيل</button>
                        </form>

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">أو</span>
                        </div>

                        <!-- تسجيل اجتماعي -->
                        <div class="social-login">
                            <span>سجل باستخدام</span>
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="google"><i class="fab fa-google"></i></a>
                            <a href="#" class="facebook"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="google"><i class="fab fa-instagram"></i></a>
                        </div>
                        <!-- /تسجيل اجتماعي -->

                        <div class="text-center dont-have">هل لديك حساب بالفعل؟ <a href="login.php">تسجيل الدخول</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<!--	login  -->
        
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
   
<!-- Wrapper End --> 
