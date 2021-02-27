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
                            <small>author</small>
                       
                         </h1>
                     
          <?php

if(isset($_SESSION['username'])){
    
   echo $_SESSION['username']; 
    
    
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
    
