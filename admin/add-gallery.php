﻿<?php
            error_reporting(0);
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
			
			$page="add_gallery";
			
			$nid = $_GET['nid'];
			if(isset($_POST))
			{
                // echo "image upload"; exit;
                extract($_POST);
                $error=array();
                $extension=array("jpeg","jpg","png","gif");
                foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                    $file_name=$_FILES["files"]["name"][$key];
                    $file_tmp=$_FILES["files"]["tmp_name"][$key];
                    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                
                    if(in_array($ext,$extension)) {
                        if(!file_exists("upload/".$file_name)) {
                            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"upload/".$file_name);
                        }
                        else {
                            $filename=basename($file_name,$ext);
                            $newFileName=$filename.time().".".$ext;
                            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"upload/".$newFileName);
                        }
                        
                        if(isset($_GET['nid']))
                        {
                            
                            $q="insert into gallery(news_id, image) values ($nid, '$newFileName')";
                            $d=mysqli_query($con,$q);

                           
                        }
                    }
                    else {
                        array_push($error,"$file_name, ");
                    }
                }
            }
            $uimg = array();
            $sql = "select image from gallery where news_id=$nid";
            $sres = mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($sres))
            {
                if($row['image']){
                  array_push($uimg,$row['image']);
                }
            }
           
            $imgURL = "http://" . $_SERVER['SERVER_NAME'] . "/newsjaaga/admin/upload/";
            
		
			// if(isset($_GET['cid']) && isset($_GET['action']))
			// {
			// 	extract($_GET);
			// 		if($action=='delete')
			// 		{
			// 		$q="select * from news where category_id='$cid'";
			// 		$d=mysqli_query($con,$q);
			// 		if(mysqli_num_rows($d)>0)
			// 		{
			// 		echo "<script>alert('Cannot Delete As News are Mapped To This Category !!')</script>";
			// 		$b_url="add-categories.php";
			// 		echo "<script type='text/javascript'>document.location.href='{$b_url}';</script>";
			// 		}
			// 		else
			// 		{
			// 		$q2="delete from category where id='$cid'";
			// 		$d2=mysqli_query($con,$q2);
			// 		if($d2)
			// 		{
			// 		echo "<script>alert('Deleted successfully !!')</script>";
			// 		$b_url="add-categories.php";
			// 		echo "<script type='text/javascript'>document.location.href='{$b_url}';</script>";
			// 		}
			// 		}
			// 		}
			// }
?>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    
    <meta name="author" content="SM Web solutions" />
    <title>Add Category</title>
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
                                <div class="page-title">Add Images</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                
                                <li class="active">Add Images</li>
                            </ol>
                        </div>
                    </div>
              
<div class="row">
                        
							
							<div class="col-md-12">
								 <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        
                                     <div class="card-head">
								                 <header>Add Images</header>
									</div>
									 <div class="card-body " id="bar-parent1">
								                                    <form method="post" enctype="multipart/form-data">
								                                      
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td>Select Photo (one or multiple):</td>
                                                                            <td><input type="file" name="files[]" multiple/></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" align="center">Note: Supported image format: .jpeg, .jpg, .png, .gif</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" align="center"><input type="submit" class="btn btn-primary" value="Create Gallery" id="selectedButton"/></td>
                                                                        </tr>
                                                                    </table>
								                                       
								                                     
								                                    </form>
								        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
								 <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                            <div class="card-head">
								    <header>Images</header>
							</div>
							<div class="card-body " id="bar-parent1">
                            <?php foreach($uimg as $nimg){ ?>    
                                <img src="<?php echo $imgURL.$nimg ?>" alt="Girl in a jacket" height="200" style="margin-right:20px;padding:10px"> 
							<?php } ?>
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
            <!-- end page content -->
                   
                     
					 
                     
                    
                
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