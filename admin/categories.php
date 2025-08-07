<?php
include 'config.php';
$result = mysqli_query($con, "SELECT * FROM categories");
?>

<?php include("header.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <a href="category_add.php" class="btn btn-primary mb-3">+ إضافة فئة</a>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الفئات</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped text-center" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>الاسم</th>
                                    <th>كلاس CSS</th>
                                    <th>صورة</th>
                                    <th>تحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['class_name']) ?></td>
                                    <td>
                                        <img src="<?= htmlspecialchars($row['image']) ?>" width="50" height="50" alt="الصورة">
                                    </td>
                                    <td class="action-buttons">
                                        <a href="category_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">تعديل</a>
                                        <a href="category_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الفئة؟')">حذف</a>
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
