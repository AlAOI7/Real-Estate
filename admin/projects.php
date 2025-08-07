<?php
include 'config.php';

// جلب المشاريع مع أسماء الفئات
$query = "SELECT p.*, c.name as category FROM projects p JOIN categories c ON c.id = p.category_id";
$result = mysqli_query($con, $query);
?>  

<?php include("header.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <a href="project_add.php" class="btn btn-primary mb-3">إضافة مشروع جديد</a>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">المشاريع</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped text-center" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم المشروع</th>
                                    <th>الفئة</th>
                                    <th>الموقع</th>
                                    <th>الخصائص</th>
                                    <th>الوصف</th>
                                    <th>الصور</th>
                                    <th>تحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= htmlspecialchars($row['name']) ?></td>
                                        <td><?= htmlspecialchars($row['category']) ?></td>
                                        <td><?= htmlspecialchars($row['address']) ?></td>
                                        <td><?= htmlspecialchars($row['features']) ?></td>
                                        <td><?= mb_strimwidth(htmlspecialchars($row['description']), 0, 50, '...') ?></td>
                                        <td>
                                            <?php
                                            // جلب صور المشروع
                                            $project_id = $row['id'];
                                            $img_query = mysqli_query($con, "SELECT image_path FROM project_images WHERE project_id = $project_id");
                                            while ($img_row = mysqli_fetch_assoc($img_query)) {
                                                echo '<img src="' . htmlspecialchars($img_row['image_path']) . '" alt="صورة المشروع" style="width:60px; height:40px; margin:2px; border-radius:4px;">';
                                            }
                                            ?>
                                        </td>
                                        <td class="action-buttons">
                                            <a href="project_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">تعديل</a>
                                            <a href="project_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('تأكيد الحذف؟')">حذف</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>
