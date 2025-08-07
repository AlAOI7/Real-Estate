

<?php
include 'config.php';

$result = mysqli_query($con, "SELECT * FROM blog_articles ORDER BY id DESC");
?>


<?php include("header.php"); ?>
<div class="page-wrapper">
    <div class="content container-fluid">



        <div class="container">
            <h1 class="mb-4">المدونه</h1>
            <a href="blog_create.php" class="btn btn-success mb-3">إضافة مقال جديد</a>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">المدونه </h4>

                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped text-center" id="basic-datatable">
                                <thead class="">
                                    <tr>
                                        <th>رقم</th>
                                        <th>العنوان</th>
                                        <th>الصورة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                                            <td><img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="" style="max-height:50px;"></td>
                                            <td>
                                                <!-- <a href="blog_details.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">عرض</a> -->
                                                <a href="blog_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">تعديل</a>
                                                <a href="blog_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟');">حذف</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php if (mysqli_num_rows($result) == 0): ?>
                                        <tr>
                                            <td colspan="4">لا توجد مقالات</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>