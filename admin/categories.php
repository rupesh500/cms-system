  <!-- CONNECTION -->
 
 <?php include "includes/admin_header.php";?>
 <?php include "function.php";?>
 
     <head>
<link href="rupesh.css" rel="stylesheet">  
</head> 
 
 
  <body>

    <div id="wrapper">

        <!-- Navigation -->
        
          <?php include "includes/admin_navigation.php";?>
        
            <div id="page-wrapper">

              <div class="container-fluid">
                 
       <!-- Page Heading -->
                <div class="row">
                 <div class="col-lg-12">
                  
                      
                    
                      <h1 class="page-header">
                 
                      Welcome to admin
                            <small>author</small>
                       
                         </h1>
       
  <div class="col-xs-6">
  
  <?php
        // INSERT CATEGORIES QUERY///
      insert_cat();?>   
 
    <!--       ADD CATEGORIES FORM                                                                              -->

    <form action=""method="post">
    <div class="form-group">

    <div style="color: red;">

        <label for="cat_title"><h2>add category</h2></label></div>
    <input type="text"class="form-control"name="cat_title">
    </div>     


    <div class="form-group">
    <input class="btn btn-primary"type="submit"name="submit"value="add category">

    </div> 

    </form> 

 
<?php
//        UPDATE AND INCLUDE QUERIES
if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
 include "includes/update_categories.php";
 
}      
      
 ?>

  </div>  
  
  
       <div class="col-xs-6"id="img"> 
    
    <table class="table table-bordered table-hover"id="table">
        <thead id="heading_color">
     <thead>  
         <tr id="back">
                 <th> <p>id</p></th>
                 <th><p>category title</p></th>
                  <th><p>category ID</p></th>
                 <th><p>Edit ID</p></th>
             </tr>
          </thead>
         <tbody>

<?php update_cat();?> 

<!--    DELETE  CATEGORIES QUERY-->     
<?php
  delete_cat();        
             
 ?>
         </tbody>
    
     </tabel>
                                  
   </div>
     </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
    
