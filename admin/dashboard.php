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
			
			$page='dashboard';
?>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
   
    <meta name="author" content="SM Web solutions" />
    <title>Admin Dashboard | News Portal</title>
<!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
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
	<!-- favicon -->
   
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
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Welcome to Admin Panel</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
					<div class="state-overview">
						<div class="row">
					        <div class="col-xl-6 col-md-6 col-12">
					          <div class="info-box bg-blue">
					            <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
					            <div class="info-box-content">
								<?php
								
								$qs="select distinct count(guide) from news";
								$data=mysqli_query($con,$qs) or die(mysqli_error($con));
								$rec=mysqli_fetch_array($data);
								?>
					              <span class="info-box-text">News</span>
					              <span class="info-box-number"><?php echo $rec['count(guide)'];?></span>
					              <div class="progress">
					                <div class="progress-bar width-60"></div>
					              </div>
					              <span class="progress-description">
					                    Total News
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-6 col-md-6 col-12">
					          <div class="info-box bg-orange">
					            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
					            <div class="info-box-content">
								<?php
								$qs="select distinct count(id) from category";
								$data=mysqli_query($con,$qs) or die(mysqli_error($con));
								$rec=mysqli_fetch_array($data);
								?>
					              <span class="info-box-text">Categories</span>
					              <span class="info-box-number"><?php echo $rec['count(id)'];?></span>
					              <div class="progress">
					                <div class="progress-bar width-40"></div>
					              </div>
					              <span class="progress-description">
					                    Total Categories
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-6 col-md-6 col-12">
					          <div class="info-box bg-purple">
					            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
					            <div class="info-box-content">
								<?php
								$qs="select distinct count(city_id) from cities";
								$data=mysqli_query($con,$qs) or die(mysqli_error($con));
								$rec=mysqli_fetch_array($data);
								?>
					              <span class="info-box-text">Cities</span>
					              <span class="info-box-number"><?php echo $rec['count(city_id)'];?></span>
					              <div class="progress">
					                <div class="progress-bar width-80"></div>
					              </div>
					              <span class="progress-description">
					                    Total Cities
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-6 col-md-6 col-12">
					          <div class="info-box bg-success">
					            <span class="info-box-icon push-bottom"><i class="material-icons">home</i></span>
					            <div class="info-box-content">
								<?php
								$qs="select distinct count(id) from login_details";
								$data=mysqli_query($con,$qs) or die(mysqli_error($con));
								$rec=mysqli_fetch_array($data);
								?>
					              <span class="info-box-text">Admin users</span>
					              <span class="info-box-number"><?php echo $rec['count(id)'];?></span>
					              <div class="progress">
					                <div class="progress-bar width-60"></div>
					              </div>
					              <span class="progress-description">
					                    Total Admin users
					                  </span>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					      </div>
						</div>
					<!-- end widget -->
                     
					 
                    
                
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
    <!-- end js include path -->
  </body>
</html>