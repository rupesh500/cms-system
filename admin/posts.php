  <!-- CONNECTION -->
  
 
 <?php include "includes/admin_header.php";?>
 <?php include "function.php";?>

 
  <body>
    <div id="wrapper">

        <!-- Navigation -->
        
          <?php include "includes/admin_navigation.php";?>
        
            <div id="page-wrapper">

              <div class="container-fluid">
                 
       <!-- Page Heading -->
                <div class="row">
                 <div class="col-lg-12">
                  
<!--                       <div style="color: green;">  -->
                    
                      <h1 class="page-header">
                 
                      Welcome to admin
                       <small><?php echo $_SESSION['db_user_firstname'];?></small>
                       
                         </h1>
   
  <?php
                           
 if(isset($_GET['source'])){
  $source = $_GET['source'];
 
     }else{
     $source = '';
     
    }
  switch($source){
    case 'add_post';
       include "add_post.php";
         break; 
    
    case 'edit_post';
         include "edit_post.php";
       
         break; 
          
           case '25';
        echo"this is 25";
         break; 
     
      default:
        include "view_all_posts.php";
        break; 
          
      }  
 
                          
 ?>                       
                                                           
  
                       </div>
                         </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
    
