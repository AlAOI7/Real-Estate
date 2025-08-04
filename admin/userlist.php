<?php include("header.php"); ?>
<!-- /Sidebar -->

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">المستخدمين</h3>

				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="container">

		
		
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							
							<div class="card-body">

								<table class="table table-bordered table-striped text-center" id="basic-datatable">
									<thead>
										<tr>
											<th>الرقم</th>
											<th>الاسم</th>
											<th>البريد الإلكتروني</th>
											<th>الهاتف</th>
											<th>النوع</th>
											<th>الصورة</th>
											<th>حذف</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = mysqli_query($con, "SELECT * FROM user WHERE utype='user'");
										$cnt = 1;
										while ($row = mysqli_fetch_row($query)) {
										?>
											<tr>
												<td><?php echo $cnt; ?></td>
												<td><?php echo $row['1']; ?></td>
												<td><?php echo $row['2']; ?></td>
												<td><?php echo $row['3']; ?></td>
												<td><?php echo $row['5']; ?></td>
												<td><img src="user/<?php echo $row['6']; ?>" height="50px" width="50px"></td>
												<td><a class="btn btn-sm btn-danger" href="userdelete.php?id=<?php echo $row['0']; ?> " onclick="return confirm('هل أنت متأكد من الحذف؟');">حذف</a></td>
											</tr>
										<?php
											$cnt++;
										}
										?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>

			

		</div>
	</div>
</div>
<!-- /Main Wrapper -->

<?php include("footer.php"); ?>