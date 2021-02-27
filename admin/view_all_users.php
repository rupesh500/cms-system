<?php include "includes/admin_header.php";?>
  <?php include "function.php";?>

 <?php $connection = mysqli_connect('localhost','root','','website');

  ?>

  
   
    <head>
<link href="rupesh.css" rel="stylesheet">  
</head>  

    <body>
  
     <style>
     #img{
    
         border-radius: 1000%;
        }
     #img:hover{
         border: 2px solid grey;
         box-shadow: 1px 1px 50px red;
     }
     
     
     </style>
    
    
    <div id="wrapper">

        <!-- Navigation -->
        
          <?php include "includes/admin_navigation.php";?>
        
            <div id="page-wrapper">

              <div class="container-fluid">
        
                            
       <!-- Page Heading -->
                <div class="row">

                 
       <h1 class="page-header">
                 
                      Welcome to admin
            <small><?php echo $_SESSION['db_user_firstname'];?></small></h1> 

  <table class="table table-bordered table-hover"id="table">
        <thead id="heading_color">
     <thead>  
         <tr id="back">
             <th>ID</th>
             <th>Username</th>
               <th>First name</th>
              <th>Last name</th>
             <th>Email</th>
                  <th>Image</th>
                <th>role</th>
                 <th>make Admin</th> 
                   <th>make Subscriber</th> 

             <th>Edit</th> 
            <th>Delete</th>
     

         </tr>
     </thead> 
<tbody>

<!--//DELETE COMMENTS QUERY-->

<?php
    

if(isset($_GET['delete'])){
 $user_id = $_GET['delete'];
 $query = "DELETE FROM users WHERE user_id = $user_id";
  $view_all_users = mysqli_query($connection,$query);
  
}  
    
    
    
    
if(isset($_GET['admin'])){
 $user_id = $_GET['admin'];

    
    $query ="UPDATE users SET role = 'admin' WHERE user_id = $user_id ";
  
    $show_comments = mysqli_query($connection,$query);
  
}


  if(isset($_GET['subscriber'])){
 $user_id = $_GET['subscriber'];

    $query ="UPDATE users SET role = 'subscriber' WHERE user_id =$user_id ";
  
    $show_comments = mysqli_query($connection,$query);
  
}  
 
 ?>  


  <?php
    
    
  
 
 $query = "SELECT * FROM users";
  $select_users = mysqli_query($connection,$query);
  
   while($row = mysqli_fetch_assoc($select_users)){
     
$user_id = $row['user_id']; 
$username = $row['username'];
$password = $row['password'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$user_image = $row['user_image']; 
 $role = $row['role'];

echo"<tr>"; 
   
       echo "<td>$user_id</td>";   
   
       echo "<td class='author'>$username</td>";
      
//       echo "<td>$password</td>";
       echo "<td>$firstname</td>";
    
       echo "<td>$lastname</td>";
      
       echo "<td>$email</td>";
       
 
        echo"<td><img src='user_image/$user_image'alt='image'height='40'id='img'width='40'></td>";
      
        echo "<td>$role</td>";
           
       echo "<td><a href='view_all_users.php?admin=$user_id'>admin</a></td>";
       
       echo "<td><a href='view_all_users.php?subscriber=$user_id'>subscriber</a></td>";
         
       echo "<td><a href='edit_user.php?edit&p_id=$user_id'>edit</a></td>";
       
           echo "<td><a <a OnClick=\" javascript:return confirm('Are you sure Delete it?');  \" href='view_all_users.php?delete=$user_id'>delete</a></td>";
       
       
          
       
  
    echo"</tr>"; 
 
   } 
    
 ?>


</tbody>
           
   </table>  
                                                                                 
     <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
    
