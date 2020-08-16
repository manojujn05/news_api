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
            <li><a href="home.php">View News</a></li>
            <li class="active"><a href="addCategory.php">Add Category</a></li>
            <li><a href="addQuestion.php">Add New News</a></li>
          </ul>        
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">News Admin Panel</h2>          
          <h4 class="sub-header">Add Category</h4>
           
          
          <form class="form-horizontal" role="form" action="addCategorydb.php" method="POST" enctype="multipart/form-data">
   <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Category Name:</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="Enter Category Name" required>
      </div>
   </div>
        
   <div class="form-group">
      <label for="ImageUpload" class="col-sm-2 control-label">Image:</label>
      <div class="col-sm-4">
          <input type="file" id="categoryimage" name="categoryimage" required>
      </div>
   </div>
       
   <div class="form-group">
      <div class="col-sm-offset-1 col-sm-8">
           <?php 
                    if (isset($_REQUEST['add_cdata'])):
                        if(!empty($_REQUEST['add_cdata'])):     
                           $add_cdata = $_GET['add_cdata'];
                        if('empty'==$add_cdata):
                        ?>
                             <div style="line-height: 1.7em;color:red;">Please Do Not Submit Empty Characters !!</div>
                            
                            <?php
                             endif;
                             
                           if('success'==$add_cdata):
                        ?>
                             <div style="line-height: 1.7em;color:blue;">Category Added Successfully !!</div>
                            
                            <?php
                             endif;
                             
                             if('failed'==$add_cdata):
                        ?>
                             <div style="line-height: 1.7em;color:red;">Server Error Please Try Again Later !!</div>
                            
                            <?php
                             endif;
                             
                        endif;
                        
                     endif;
                        
            
            ?>
                                             
         <button type="submit" class="btn btn-default">Add Category</button>
      </div>
   </div>
</form>
          
          
             <h4 class="sub-header">View Category</h4>
             
             
             
              <?php 
          if (isset($_REQUEST['delete'])):
              if(!empty($_REQUEST['delete'])): 
                   $add_cdata = $_GET['delete'];
              
                  if('exists'==$add_cdata):
                  
                  ?>
          
           <div style="line-height: 1.7em;color:red;">Cannot Delete As News are Mapped To This Category !!</div>
          <?php 
          endif;
          
          endif;
          endif;
          ?>
          
          <div class="col-sm-9 col-md-8  main">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  
                  <th>Category Photo</th>
                  <th>Category Name</th>
                  <th>Delete Category</th>
                 
                </tr>
              </thead>
              <tbody>
                  
                   <?php 
                    require 'db.php';
                    $result = mysqli_query($conn,"SELECT * FROM category")  ;
                    if (mysqli_num_rows($result) > 0) :
                         while ($row = $result->fetch_assoc()) {
                            $id = $row["id"]; 
                            $cname = $row["category_name"];       
                            $cphoto = $row["category_image"];                            
                            $cphotourl = 'upload/'.$cphoto;
                            
                           ?>
                <tr>
                  
                  <td><?php echo $id;?></td>
                  
                  <td><img src="<?php echo $cphotourl;?>" height="50px" width="50px"></td>  
                  <td><?php echo $cname;?></td>
                  <td><a href="deleteCategory.php?cid=<?php echo $id?>">Delete</a></td> 
                  
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
