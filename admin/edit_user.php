
<?php include "includes/admin_header.php";?>
<?php include "../db.php";?>
 <?php include "function.php";?>

<body>

    <div id="wrapper">

        
        <?php include "includes/admin_navigation.php";?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">
            
       <form action=""method="post"enctype="multipart/form-data">
  
   
     <div class="form-group">

  
  <?php

    //  EDIT USER IN PROFILE PAGE QUERY
      if(isset($_GET['p_id'])){
       
     $user_id = $_GET['p_id'];
    
    
    $query = "SELECT * FROM users WHERE user_id = $user_id ";
    
    $select_user = mysqli_query($connection,$query); 
    
    while($row = mysqli_fetch_array($select_user)){
      
      
      $username = $row['username'];
      $password = $row['password'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
    
  }

 }
                     
?>





<?php

         //UPDATE USER PROFILE

if(isset($_POST['edit_user'])){

      $firstname = $_POST['firstname'];
    
     $lastname = $_POST['lastname'];
   
    
    
       $username = $_POST['username'];
    //  $post_image = $_FILES['image']['name'];
//  $post_image_temp = $_FILES['image']['tmp_name'];
   $email = $_POST['email'];
     $password = $_POST['password'];
    
    
//    move_uploaded_file($post_image_temp, "images/$post_image" );
       
       
      if(empty($firstname)){
          
      echo "<script>alert('first name should not be empty');</script>";  
        
    }else{
   
    
  $query = "UPDATE users SET";
    $query .="firstname = '{$firstname}', "; 
    $query .="lastname = '{$lastname}', ";
    
    $query .="username = '{$username}', ";
    $query .="email = '{$email}', "; 
     $query .="password = '{$password}' "; 
     $query .="WHERE user_id  = '{$user_id}' "; 
          
          
    $update_user_query = mysqli_query($connection,$query);
    if(!$update_user_query){
      die("QUERY FAILED" . mysqli_error($connection));  
        
 }
      
}
   echo "User Created: " . " " . "<a href='view_all_users.php'>view users</a> ";    
}
    
?> 
  
  <body>
 
    <div id="wrapper">

        <!-- Navigation -->
        
          <?php include "includes/admin_navigation.php";?>
        
            <div id="page-wrapper">

              <div class="container-fluid">
                 
       <!-- Page Heading -->
              
                <div class="row">
                
                
                 <div class="col-lg-8">
                  
<!--                       <div style="color: green;">  -->
                    
                      <h1 class="page-header">
                      
                          <h1><center>Edit User</center></h1>
                         

                     
      <form action=""method="post"enctype="multipart/form-data"class="form">
     <div class="form-group">
       
     
        <label for="firstname">First name</label>
      <input value="<?php echo $firstname;?>" type="text"class="form-control"name="firstname">
   </div>     

   
     <div class="form-group">
        <label for="lastname">Last name</label>
      <input value="<?php echo $lastname ;?>" type="text"class="form-control"name="lastname">
   </div> 
       


     
     <div class="form-group">
        <label for="Username">Username</label>
      <input value="<?php echo $username ;?>" type="text"class="form-control"name="username">
   </div> 
       
     
        
     <div class="form-group">
        <label for="Email">Email</label>
   <input value="<?php echo $email ;?>" type="text"class="form-control"name="email">
   </div> 
   
       <div class="form-group">
        <label for="password">password</label>
   <input value="<?php echo $password ;?>" type="password"class="form-control"name="password">
   </div> 
   
    
       <center>
           <div class="form-group">
    <input class="btn btn-succsess" type="submit"name="edit_user"value="Edit User">
  </center>
         </div>

                </form>
                
     

                       </div>
                  
                        
                         </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
    
