<?php
			session_start();
			require('inc/config.php');
			$admin_id=$_SESSION['admin_id'];
			$qs="select * from login_details where id='$admin_id'";
			$data=mysqli_query($con,$qs) or die(mysqli_error($con));
			$rec=mysqli_fetch_array($data);
			
			if(!isset($_SESSION['admin_id']))
			{
			header('location:index.php');
			}
			
			$page="corona_cases";
			
			
			if(isset($_POST['update']))
			{
			extract($_POST);
			$today=date('Y-m-d');
			$q="update corona_cases set total_cases='$confirmed',total_discharged='$discharged',total_deaths='$deaths',total_active='$active',updated_on='$today' where id='1'";
			$d=mysqli_query($con,$q);
			if($d)
			{
			echo "<script>alert('Updated successfully')</script>";
			$b_url="corona-cases.php";
			echo "<script type='text/javascript'>document.location.href='{$b_url}';</script>";
			}
			else
			{
			echo "<script>alert('Failed to updated')</script>";
			}
			}
			
		
			
?>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
   
    <meta name="author" content="SM Web solutions" />
    <title>Corona cases</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- morris chart -->
    <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	
 </head>
 <!-- END HEAD -->
 <!-- START HEADER -->
		<?php
				require('inc/header.php');
		?>
 <!-- END HEADER-->
 
 
        <!-- start page container -->
        <div class="page-container">
 			<?php
					require('inc/sidebar.php');
			?>
 			
			<!-- start page content -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Corona Cases</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                
                                <li class="active">Corona Cases</li>
                            </ol>
                        </div>
                    </div>
              
<div class="row">
                        
							
							<div class="col-md-5">
								 <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        
                                     <div class="card-head">
								                 <header>Update Corona cases</header>
									</div>
									 <div class="card-body " id="bar-parent1">
								                                    <form method="post">
								                                       <div class="form-group">
								                                            <label for="simpleFormPassword">Total Confirmed</label>
								                                            <input type="text" name="confirmed" class="form-control" required placeholder="Total Confirmed" required>
								                                        </div>
																		<div class="form-group">
								                                            <label for="simpleFormPassword">Total Discharged</label>
								                                            <input type="text" name="discharged" class="form-control" required placeholder="Total Discharged" required>
								                                        </div>
																		<div class="form-group">
								                                            <label for="simpleFormPassword">Deaths</label>
								                                            <input type="text" name="deaths" class="form-control" required placeholder="Total Deaths" required>
								                                        </div>
																		<div class="form-group">
								                                            <label for="simpleFormPassword">Total Active</label>
								                                            <input type="text" name="active" class="form-control" required placeholder="Total Active" required>
								                                        </div>
								                                        
								                                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
								                                    </form>
								        </div>
                                       
                                    </div>
                                </div>
                            </div>
							
							
							<div class="col-md-7">
								 <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        
                                     <div class="card-head">
								                 <header>Present Data</header>
									</div>
									 <div class="card-body " id="bar-parent1">
								                                 <table class="table table-striped">
																  <thead>
																	<tr>
																	  <th>Total Confirmed</th>
																	 <th>Discharged</th>
																	  <th>Death</th>
																	  <th>Active</th>
																	  <th>Updated on</th>
																	 </tr>
																  </thead>
															<?php
															$q1="SELECT * FROM corona_cases where id='1'";
															$d1=mysqli_query($con,$q1);
															if (mysqli_num_rows($d1) > 0)
															{
															while($row =mysqli_fetch_array($d1))
															{
															?>
															 <tr>
                  
													  <td><?php echo $row['total_cases'];?></td>
													  <td><?php echo $row['total_discharged'];?></td>
													  <td><?php echo $row['total_deaths'];?></td> 
													  <td><?php echo $row['total_active'];?></td> 
													  <td><?php echo $row['updated_on'];?></td> 
													  
													</tr>
															<?php
															}
															}
															?>
															
																  <tbody>
																  </tbody>
																 </table>
								        </div>
                                       
                                    </div>
                                </div>
                            </div>
							
							
							
							</div>								
							</div>
							</div>
						</div> 
                </div>
            </div>
            <!-- end page content --
                   
                     
					 
                     
                    
                
            </div>
            <!-- end page content -->
            <?php
					require('inc/settings.php');
			?>
        </div>
        <!-- end page container -->
        <?php
				require('inc/footer.php');
		?>
    </div>
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <script src="assets/plugins/popper/popper.min.js" ></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js" ></script>
	<script src="assets/js/pages/sparkline/sparkline-data.js" ></script>
    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
    <script src="assets/js/theme-color.js" ></script>
    <!-- material -->
    <script src="assets/plugins/material/material.min.js"></script>
    <!-- animation -->
    <script src="assets/js/pages/ui/animations.js" ></script>
    <!-- morris chart -->
    <script src="assets/plugins/morris/morris.min.js" ></script>
    <script src="assets/plugins/morris/raphael-min.js" ></script>
    <script src="assets/js/pages/chart/morris/morris_home_data.js" ></script>
    <!-- end js include path -->  </body>
</html>