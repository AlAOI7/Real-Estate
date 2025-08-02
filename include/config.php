
<?php
$host = "localhost";
$username = "root";
$password = ""; // إذا لم يكن هناك كلمة مرور
$dbname = "build"; // ✅ غيّر هذا إلى اسم قاعدة بياناتك

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
