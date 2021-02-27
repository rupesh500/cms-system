  <!-- CONNECTION -->
 
 <style>
     #img{
         
    margin-top: 100px;
         margin-left: 100px;
         border-radius: 250%;
        }
     
     #img:hover{
         

         box-shadow: 1px 1px 50px orange;
       
     }
     
     
     </style>
 

 <?php include "includes/admin_header.php";?>
                 <?php include "function.php";?>
            

                
     <!--     CONNECTION-->
 
  <?php $connection = mysqli_connect('localhost','root','','website');
   if(!$connection){
       die("QUERY FAILED" . mysqli_error($connection));
       
     }

  ?>
 
  
  <?php

    //  EDIT USER IN PROFILE PAGE QUERY
                     
if(isset($_SESSION['db_username'])){
  $username = $_SESSION['db_username'];


    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    
    $select_user_profile = mysqli_query($connection,$query); 
    
    while($row = mysqli_fetch_array($select_user_profile)){
      
      $user_id = $row['user_id']; 
      $username = $row['username'];
      $password = $row['password'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $user_image = $row['user_image']; 
      $role = $row['role'];
  
     
  }
}
                     
                     
?>



  <body>
  
  
  
  <?php

         //UPDATE USER PROFILE

if(isset($_POST['update_user'])){

      $firstname = $_POST['firstname'];
    
     $lastname = $_POST['lastname'];
   
      $role = $_POST['role'];
    
       $username = $_POST['username'];
    //  $post_image = $_FILES['image']['name'];
//  $post_image_temp = $_FILES['image']['tmp_name'];
   $email = $_POST['email'];
     $password = $_POST['password'];
    
    
//    move_uploaded_file($post_image_temp, "images/$post_image" );
       
       
      if(empty($firstname)){
      echo "this fileld should not be Empty";  
        
    }else{
   
    
  $query = "UPDATE users SET ";
    $query .="firstname = '{$firstname}', "; 
    $query .="lastname = '{$lastname}', ";
    $query .="role = '{$role}', "; 
    $query .="username = '{$username}', ";
    $query .="email = '{$email}', "; 
     $query .="password = '{$password}' "; 
     $query .="WHERE username  = '{$username}' "; 
          
          
    $update_user_query_final  = mysqli_query($connection,$query);
    if(!$update_user_query_final){
      die("QUERY FAILED" . mysqli_error($connection));  
        
 }
  
}
}
    
?> 

 
    <div id="wrapper">
        
       

        <!-- Navigation -->
        
          <?php include "includes/admin_navigation.php";?>
        
            <div id="page-wrapper">

              <div class="container-fluid">
                 
       <!-- Page Heading --> 
              
                <div class="row">
                
                
                 <div class="col-lg-4">
                 
                 
                  
<!--                       <div style="color: green;">  -->
                    
                     <h1 class="page-header">
                 
                      Welcome to admin
           <small>  <?php echo $_SESSION['db_user_firstname'];?></small> </h1> 
      
                         
                         

      <form action=""method="post"enctype="multipart/form-data"class="form">
     <div class="form-group">
       
     
        <label for="firstname">First name</label>
      <input value="<?php echo $firstname; ?>" type="text"class="form-control"name="firstname">
   </div>     

   
     <div class="form-group">
        <label for="lastname">Last name</label>
      <input value="<?php echo $lastname ;?>" type="text"class="form-control"name="lastname">
   </div> 
       

       
         <div class="form-group">
       <select name="role" id="" class="form-control">
       <option value="subscriber"><?php echo $role ;?></option>
       <?php
           
         if($role == 'admin'){ 
         echo "<option value='subscriber'>subscriber</option> "; 
         
         }else{
             
        echo "<option value='admin'>admin</option> ";  
             
         }
             
      ?>

       </select>
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
   
    
       
           <div class="form-group">
    <input class="btn btn-succsess" type="submit"name="update_user"value="update User">
  
         </div>
 
                </form>
           </div>
                       
                       
              <div class="col-lg-4">
                     
              
             <?php
                                
 echo"<td><img src='user_image/$user_image'alt='image'height='400'id='img'></td>";             
                     
              ?>           
                 
                             
           
                       
                         </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
    
