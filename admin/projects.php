<?php
include 'config.php';
$query = "SELECT p.*, c.name as category FROM projects p JOIN categories c ON c.id = p.category_id";
$result = mysqli_query($con, $query);
?>

 <?php include("header.php"); ?>

     <div class="page-wrapper">
                <div class="content container-fluid">
                    


<a href="project_add.php"  class="add-button">إضافة مشروع جديد</a>

<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">المشاريع </h4>
									
								</div>
								<div class="card-body">

                    <table class="table table-bordered table-striped text-center" id="basic-datatable">
                            <tr>
                                <th>ID</th>
                                <th>اسم المشروع</th>
                                <th>الفئة</th>
                                <th>الموقع</th>
                                <th>الخصائص</th>
                                <th>الوصف</th>
                                <th>تحكم</th>
                            </tr>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['category'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['features'] ?></td>
                                <td><?= mb_strimwidth($row['description'], 0, 50, '...') ?></td>
                                <td class="action-buttons">
                                    <a href="project_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">تعديل</a>
                                    <a href="project_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('تأكيد الحذف؟')">حذف</a>
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

