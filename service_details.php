<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");	
include("include/header.php");							
?>




<?php


$id = intval($_GET['id'] ?? 0);

$sql = "SELECT * FROM services WHERE id = $id";
$result = $con->query($sql);

if ($result->num_rows == 0) {
  echo "الخدمة غير موجودة";
  exit;
}

$service = $result->fetch_assoc();
?>


<style>
  .service-details-container {
    max-width: 600px;
    margin: 40px auto;
    /* توسيط العرض مع تباعد من الأعلى */
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .service-details-container img {
    max-width: 100%;
    max-height: 300px;
    object-fit: contain;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  .service-details-container h2 {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #333;
    text-transform: uppercase;
  }

  .service-details-container p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #555;
    margin-bottom: 30px;
  }

  .service-details-container .btn-order {
    background-color: #007bff;
    /* أزرق bootstrap */
    color: white;
    padding: 12px 30px;
    font-size: 1.2rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.3s ease;
  }

  .service-details-container .btn-order:hover {
    background-color: #0056b3;
    text-decoration: none;
    color: white;
  }

  .service-details-container .btn-order i {
    font-size: 1.4rem;
  }
</style>

<div class="service-details-container">
  <img src="admin/uploads/<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['name']); ?>">
  <h2><?php echo htmlspecialchars($service['name']); ?></h2>
  <p><?php echo htmlspecialchars($service['description']); ?></p>

  <a href="tel:+967773748697" class="btn btn-primary ">
    <i class="fas fa-phone"></i> اطلب الان
  </a>
  <!-- زر الطلب ينقلك لصفحة الطلب مع id الخدمة -->
  <a href="order.php?id=<?php echo intval($service['id']); ?>" class="btn-order" title="طلب الخدمة">
    <i class="fas fa-shopping-cart"></i> طلب
  </a>

</div>

<?php $con->close(); ?>





<?php include("include/footer.php"); ?>