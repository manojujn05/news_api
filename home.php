<?php
session_start();
if(!isset($_SESSION['usr'])){
  header("Location: index.php");
        die();
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>News Admin Panel</title>

    <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">News Admin Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
              <li><a href="logoff.php">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="home.php">View News</a></li>
            <li><a href="addCategory.php">Add Category</a></li>
            <li><a href="addQuestion.php">Add New News</a></li>
          </ul>        
         
        </div>
        <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">News Admin Panel</h2>          
          <h4 class="sub-header">View News</h4>
           
          
          <div class="col-sm-12 col-md-8  main">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  
                  <th>Id</th>                  
                  <th>News Image</th>
				  <th>News Title</th>
                  <th>Category</th>
                  <th style="width:330px">News</th>               
                  <th style="width:130px">Edit</th>
                  <th>Delete</th>
                  <th>Push</th>
                </tr>
              </thead>
              <tbody>
                  
                   <?php 
                    require 'db.php';
                    $result = mysqli_query($conn,"SELECT * FROM news");
                    if (mysqli_num_rows($result) > 0) :
                         while ($row = $result->fetch_assoc()) {
                            $id = $row["guide"]; 
                            $title = $row["title"];
                            $desc = $row["description"];							       
                            $rphoto = $row["image"];                            
                            $rphotourl = 'upload/'.$rphoto;                            
                                                       
                            $cat_id = $row["category_id"];
                            
                                                        
                            $result_pcat = mysqli_query($conn,"SELECT category_name FROM category where id=".$cat_id)  ;
                            $data_pcat = mysqli_fetch_assoc($result_pcat);
                            $catname = $data_pcat['category_name']; 
                            
                          
							
							  
                            
                           ?>
                <tr>
                  
                  <td><?php echo $id;?></td>
                  <td><img src="<?php echo $rphotourl;?>" height="50px" width="50px"></td>  
                  <td><?php echo $title;?></td>
                  <td><?php echo $catname;?></td>
				  <td><?php echo $desc;?></td>
                  
                  <td><a href="editQuestion.php?qid=<?php echo $id?>">View / Edit</a></td> 
                  <td><a href="deleteQuestion.php?quesid=<?php echo $id?>">Delete</a></td> 
				  <td><a href="getJsonNotification.php?guid=<?php echo $id?>" target="_blank">Get Json</a></td> 
                  
                </tr>
               
                <?php } endif; ?>
              </tbody>
            </table>
          </div>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>

   
  </body>
</html>
