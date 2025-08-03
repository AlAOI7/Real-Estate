<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>عرض التقييمات</title>
</head>
<body>
      <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">


   
    <a href="reviewscreate.php"  class="add-button">إضافة تقييم جديد</a>
   <div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">تقييم </h4>
									
								</div>
								<div class="card-body">

<table class="table table-bordered table-striped text-center" id="basic-datatable">
        
            <tr>
                <th>الخبرة</th>
                <th>المشاريع</th>
                <th>العملاء</th>
                <th>التقييم العام</th>
                <th>تحكم</th>
            </tr>
      
            <?php
            $result = $con->query("SELECT * FROM reviews");
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['experience_years'] ?> سنة (<?= $row['experience_percent'] ?>%)</td>
                <td><?= $row['projects_count'] ?> مشروع (<?= $row['projects_percent'] ?>%)</td>
                <td><?= $row['clients_count'] ?> عميل (<?= $row['clients_percent'] ?>%)</td>
                <td><?= $row['overall_rating'] ?> / 5</td>
                <td class="action-buttons">
                    <a  class="edit-btn" href="reviewsedit.php?id=<?= $row['id'] ?>">تعديل</a> 
                    <a class="delete-btn" href="reviewsdelete.php?id=<?= $row['id'] ?>" onclick="return confirm('هل تريد الحذف؟')">حذف</a>
                </td>
            </tr>
            <?php endwhile; ?>
        
    </table>
                                </div>
                            </div>
                        </div>
   </div>

                </div>
     </div>
 <?php include("footer.php"); ?>
