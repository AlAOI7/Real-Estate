<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>عرض السلايدر</title>
</head>

<?php include("header.php"); ?>

<div class="page-wrapper">
    <div class="content container-fluid">




        <a href="createsliders.php" class="add-button">إضافة سلايدر جديد</a>
        <?php
        $result = mysqli_query($con, "SELECT * FROM sliders ORDER BY id DESC");
        ?>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">السلايدرات </h4>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped text-center" id="basic-datatable">
                            <thead class="">
                                <tr>
                                    <th>الصورة</th>
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>نص الزر</th>
                                    <th>رابط الزر</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" width="100" alt="الصورة"></td>
                                        <td><?= htmlspecialchars($row['title']) ?></td>
                                        <td><?= htmlspecialchars($row['subtitle']) ?></td>
                                        <td><?= htmlspecialchars($row['button_text']) ?></td>
                                        <td><?= htmlspecialchars($row['button_link']) ?></td>
                                        <td class="action-buttons">
                                            <a href="editsliders.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">تعديل</a>
                                            <a href="deletesliders.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
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