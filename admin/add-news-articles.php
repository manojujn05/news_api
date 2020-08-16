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
			
			$page="add_articles";
			
			
			if(isset($_POST['add']) && isset($_FILES['img']))
			{
				extract($_POST);
				
						$img = $_FILES['img']['name'];
						$file_path = 'upload/';
						$today=date('Y-m-d');
						$file_path = $file_path . basename($_FILES['img']['name']);
						
					
						if(move_uploaded_file($_FILES['img']['tmp_name'], $file_path))
						{
						$q1="INSERT INTO `news`(title,city,image,category_id,source_title,source_link,videourl,image_type,description,postdate) VALUES ('$title','$city','$img','$cat','$source','$source_link','$videourl','$img_type','$desc','$today')";
						
						$d1=mysqli_query($con,$q1) or die(mysqli_error($con));
						if($d1)
						{
						echo "<script>alert('News Article posted successfully')</script>";
						$b_url="add-news-articles.php";
						echo "<script type='text/javascript'>document.location.href='{$b_url}';</script>";
						}
						}
					
			}
			
			
			
?>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="Editport" />
    
    <meta name="author" content="SM Web solutions" />
    <title>Add news Articles</title>
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
                                <div class="page-title">Add news Articles</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                
                                <li class="active">Add news Articles</li>
                            </ol>
                        </div>
                    </div>
              
<div class="row">
                        
							
							
							
							
							<div class="col-md-12">
								 <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        
                                     <div class="card-head">
								                 <header>News Articles list</header>
									</div>
									 <div class="card-body " id="bar-parent1">
								                          <form method="post" enctype="multipart/form-data">
																
																<div class="form-group">
																		<label>Select Category</label>
																		<select class="form-control" name="cat" required >
																		<option value="">Select one</option>
																		<?php
																		
																		$q2="SELECT * FROM category";
																		$d2=mysqli_query($con,$q2);
																		while($rec =mysqli_fetch_array($d2))
																		{
																		?>
																		<option value="<?php echo $rec['id'];?>"><?php echo $rec['category_name'];?></option>
																		<?php
																		}
																		?>
																		</select>
																</div>
																<div class="form-group">
																		<label>Select City</label>
																		<select class="form-control" name="city" required >
																		<option value="">Select city</option>
																		<?php
																		
																		$q2="SELECT * FROM cities";
																		$d2=mysqli_query($con,$q2);
																		while($rec =mysqli_fetch_array($d2))
																		{
																		?>
																		<option value="<?php echo $rec['city_id'];?>" ><?php echo $rec['city_name'];?></option>
																		<?php
																		}
																		?>
																		</select>
																</div>
																<div class="form-group">
																		<label>Title</label>
																		<input type="text" name="title" class="form-control" required >
																</div>
																<div class="form-group">
																		<label>Description</label>
																		<input type="text" name="desc" class="form-control" required >
																</div>
																<div class="form-group">
																		<label>Source Name</label>
																		<input type="text" name="source" class="form-control" required >
																</div>
																<div class="form-group">
																		<label>Source link</label>
																		<input type="text" name="source_link" class="form-control" required >
																</div>
																<div class="form-group">
																		<label>Youtube URL</label>
																		<input type="text" name="videourl" class="form-control" required >
																</div>
																<div class="form-group">
																<div class="radio">
																	<label>Image Type</label> <br>
																	<label><input type="radio" name="img_type" value=1 checked>Single</label>
																	<label><input type="radio" name="img_type" value=2>Card</label>
																	<label><input type="radio" name="img_type" value=3>Gallery</label>
    															</div>	
																</div>
																
																<div class="form-group">
																		<label>Thumbnail Image</label>
																		<input type="file" name="img" class="form-control" required>
																</div>
																<div class="form-group">
																		
																		<button type="submit" name="add" class="btn btn-primary">ADD</button>
																</div>
																
																
														  </form>
														  
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