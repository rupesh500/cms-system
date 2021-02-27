
<?php include "includes/admin_header.php";?>
<?php include "../db.php";?>
 <?php include "function.php";?>

<body>
 
    <div id="wrapper">
  
        <?php include "includes/admin_navigation.php";?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">
       
 <?php
          
if(isset($_POST['submit'])){

//   $user_id = $_POST['user_id'];
     
      $firstname = $_POST['firstname'];
    
     $lastname = $_POST['lastname'];
        
      $role = $_POST['role'];
    
       $username = $_POST['username'];
      $user_image = $_FILES['user_image']['name'];
  $user_image_temp = $_FILES['user_image']['tmp_name'];
   $email = $_POST['email'];
     $password = $_POST['password'];
 
    move_uploaded_file($user_image_temp, "user_image/$user_image" );
       
    if(empty($email)){
      echo "this fileld should not be Empty";  
        
    }else{
    

     
 $query = "INSERT INTO users(firstname,lastname,role,username,email,user_image,password) ";
  $query .= "VALUES('$firstname','$lastname','$role', '$username','$email','$user_image','$password')";  
 $result = mysqli_query($connection,$query);
  
    if(!$result){
        
    die("QUERY FAILED" . mysqli_error($connection));    
        
    }
   }
    
 echo "User Created: " . " " . "<a href='view_all_users.php'>view users</a> ";  
 
}
    
?>
           <center>   
           <div class="col-sm-5">                                                                                                                                   
     <form action=""method="post"enctype="multipart/form-data">
     <div class="form-group">
               <fieldset><legend><h1>Add User</h1></legend></fieldset>
     
        <label for="firstname">First name</label>
      <input type="text"class="form-control"name="firstname">
   </div>     

   
     <div class="form-group">
        <label for="lastname">Last name</label>
      <input type="text"class="form-control"name="lastname">
   </div> 
       
<!--
     <div class="form-group">
        <label for="post_status">post status</label>
      <input type="text"class="form-control"name="post_status">
   </div>
-->
       
         <div class="form-group">
       <select name="role" id="" class="form-control">
       <option value="admin">Admin</option>
       <option value="subscriber">Subscriber</option>
       </select>
         </div>
     
       
     <div class="form-group">
        <label for="Username">Username</label>
      <input type="text"class="form-control"name="username">
   </div> 
       
     
        
     <div class="form-group">
        <label for="Email">Email</label>
   <input type="text"class="form-control"name="email">
   </div> 
   
   
     <div class="form-group">
        <label for="user_image">User image</label>
      <input type="file" name="user_image">
   </div>
   
   
   
   
       <div class="form-group">
        <label for="password">password</label>
   <input type="password"class="form-control"name="password">
   </div> 
   
    
       
           <div class="form-group">
    <input class="btn btn-succsess" type="submit"name="submit"value="Add User">
  
         </div>
 
                </form>
           
                <!-- /.row -->

            </div>
            
             <div class="col-sm-8">   
       
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
     