	<?php include("header.php"); ?>
<?php

 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">عرض من نحن </h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">عرض معلومات من نحن</h4>
									<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];
											
									?>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										   <table class="table table-bordered table-striped text-center" id="basic-datatable">
											<thead>
												<tr>
													<th>Id</th>
													<th>العنوان</th>
													<th>محتوى</th>
													<th>الصوره </th>
													<th>تعديل</th>
													<th>حذف</th>
													
												</tr>
											</thead>
											<?php
													
													$query=mysqli_query($con,"select * from about");
													$cnt=1;
													while($row=mysqli_fetch_row($query))
														{
											?>
											<tbody>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td><?php echo $row['1']; ?></td>
													<td><?php echo $row['2']; ?></td>
													<td><img src="upload/<?php echo $row['3']; ?>" height="200px" width="200px"></td>
													<td><a href="aboutedit.php?id=<?php echo $row['0']; ?>" class="btn btn-sm btn-primary">تعديل</a></td>
													<td><a href="aboutdelete.php?id=<?php echo $row['0']; ?>" class="btn btn-sm btn-danger">حذف</a></td>
												</tr>
											</tbody>
												<?php
												$cnt=$cnt+1;
												} 
												?>
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
