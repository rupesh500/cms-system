
    
   <?php  include "db.php"; ?>
 <?php  include "header.php"; ?>
    <!-- Navigation -->
    
    <?php  include "navigation.php"; ?>

                
     <?php           
                
         if(isset($_POST['submit'])){

//   $user_id = $_POST['user_id'];
     
      $firstname = $_POST['firstname'];
    
     $lastname = $_POST['lastname'];
       
             
       $username = $_POST['username'];
      $user_image = $_FILES['user_image']['name'];
  $user_image_temp = $_FILES['user_image']['tmp_name'];
   $email = $_POST['email'];
     $password = $_POST['password'];
 
    move_uploaded_file($user_image_temp, "admin/user_image/$user_image" );
       
    if(empty($email) || empty($firstname)){
      echo "this fileld should not be Empty";  
        
    }else{
    

 $query = "INSERT INTO users(firstname,lastname,username,email,user_image,password) ";
  $query .= "VALUES('$firstname','$lastname','$username','$email','$user_image','$password')";  
 $result = mysqli_query($connection,$query);
  
    if(!$result){
        
    die("QUERY FAILED" . mysqli_error($connection));    
        
    }
   }
             
  echo "<script>alert(Register user successfully...);</script>";
             

}
    
?>
     
    <div class="container">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                          
               
                    
                              
 <center>                                                                  
     <form action=""method="post"enctype="multipart/form-data">
     <div class="form-group">
               <fieldset><legend><h1>Register</h1></legend></fieldset>
     
        <label for="firstname">First name</label>
      <input type="text"class="form-control"name="firstname">
   </div>     

   
     <div class="form-group">
        <label for="lastname">Last name</label>
      <input type="text"class="form-control"name="lastname">
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
                
                
                
                
                
                
                
                
                
                
                
                
                

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>

<?php include "footer.php";?>
   

     </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

         
               
                <!-- Blog Search Well -->
            
                


<!-- Blog Categories Well -->

                   

<!-- Side Widget Well -->
         

            
            </div>

        </div>
        <!-- /.row -->

        <hr>

      <!--footer.php-->

        