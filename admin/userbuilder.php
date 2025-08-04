	<?php include("header.php"); ?>
<?php

require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>

		
			<!-- Header -->
			
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">البناء</h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">قائمه البنائين</h4>
									<?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
								</div>
								<div class="card-body">

									<table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>الاسم</th>
                                                    <th>البريد</th>
                                                    <th>الهاتف</th>
                                                    <th>النوع</th>
													<th>الصوره</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select * from user where utype='builder'");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>
                                                    <td><?php echo $row['5']; ?></td>
													<td><img src="user/<?php echo $row['6']; ?>" height="50px" width="50px"></td>
                                                    <td><a  class="btn btn-danger btn-sm" href="userbuilderdelete.php?id=<?php echo $row['0']; ?>">حذف</a></td>
                                                </tr>
                                                <?php
												$cnt=$cnt+1;
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
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
		<script src="assets/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>
