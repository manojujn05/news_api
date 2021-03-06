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
            <li><a href="addCategory.php">Add Category</a></li>
            <li class="active"><a href="addQuestion.php">Add New News</a></li>
          </ul>        
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">News Admin Panel</h2>          
          <h4 class="sub-header">Add New News</h4>
           
          
          <form class="form-horizontal" role="form" action="addQuestiondb.php" method="POST" enctype="multipart/form-data">
             
              
                 <div class="form-group">
               <label for="CategorySelect" class="col-sm-2 control-label">Select Category:</label>
               <div class="col-sm-4">
                   <select name="categoryid" id="categoryid" required>
                       <option value="-1">Select Category</option>   
                  <?php 
                    require 'db.php';
                    $result = mysqli_query($conn,"SELECT * FROM category")  ;
                    if (mysqli_num_rows($result) > 0) :
                         while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];     
                            $cname = $row["category_name"];
                            ?>
                      <option value="<?php echo $id;?>"><?php echo $cname;?></option>   
                             <?php
                            
                         }
                    endif;
                  ?>
                      
                  </select>
                   
               </div>
            </div>
              
                           
              
              
   <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Title:</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="title" name="title" placeholder="Enter News Title" required>
      </div>
   </div>
   
   <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Description:</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="description" name="description" placeholder="Enter News Description" required>
      </div>
   </div>
   
     <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Source Name:</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="source_title" name="source_title" placeholder="Enter Source Name" required>
      </div>
   </div>
   
     <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Source Link:</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="source_link" name="source_link" placeholder="Enter Source Link" required>
      </div>
   </div>
        
              
  <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Youtube URL:</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" id="videourl" name="videourl" placeholder="Enter Youtube URL">
      </div>
   </div>
   
    <div class="form-group">
      <label for="Tag" class="col-sm-2 control-label">Post Date:</label>
      <div class="col-sm-4">
         <input type="date" class="form-control" id="postdate" name="postdate" required>
      </div>
   </div> 
              
   <div class="form-group">
      <label for="ImageUpload" class="col-sm-2 control-label">News Image:</label>
      <div class="col-sm-4">
          <input type="file" id="newsimage" name="newsimage" required>
      </div>
   </div>
       
   <div class="form-group">
      <div class="col-sm-offset-1 col-sm-8">
           <?php 
                    if (isset($_REQUEST['add_qdata'])):
                        if(!empty($_REQUEST['add_qdata'])):     
                           $add_qdata = $_GET['add_qdata'];
                        if('empty'==$add_qdata):
                        ?>
                             <div style="line-height: 1.7em;color:red;">Please Do Not Submit Empty Characters !!</div>
                            
                            <?php
                             endif;
                             
                           if('success'==$add_qdata):
                        ?>
                             <div style="line-height: 1.7em;color:blue;">Question Added Successfully !!</div>
                            
                            <?php
                             endif;
                             
                             if('failed'==$add_qdata):
                        ?>
                             <div style="line-height: 1.7em;color:red;">Server Error Please Try Again Later !!</div>
                            
                            <?php
                             endif;
                             
                        endif;
                        
                     endif;
                        
            
            ?>
                                             
         <button type="submit" class="btn btn-default">Add News</button>
      </div>
   </div>
</form>
          
           
           
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/json2.js"></script>

 
   
  </body>
</html>
