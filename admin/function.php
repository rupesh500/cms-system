<?php


//     USER ONLINE COUNT
function users_online(){
    
    global $connection;
  $session = session_id();
    $time = time();
    $time_out_in_second = 10;
    $time_out = $time - $time_out_in_second;
$query = "SELECT * FROM user_online WHERE session = '$session'";    
 $send_query = mysqli_query($connection,$query);   
$count = mysqli_num_rows($send_query);    
 
    if($count == NULL){
        
 mysqli_query($connection,"INSERT INTO user_online(session, time) VALUES('$session','$time')");       
        
    }else{
      
 mysqli_query($connection,"UPDATE user_online SET time = '$time' WHERE session = '$session'");  
            
    }
    
$user_online_query = mysqli_query($connection, "SELECT * FROM user_online WHERE time > '$time_out'" );     
    
return $count_user = mysqli_num_rows($user_online_query);      
    
      
}




function insert_cat(){
   global $connection; 
 
  if(isset($_POST['submit'])){
$cat_title = $_POST['cat_title'];     

if($cat_title == "" ||empty ($cat_title)){

echo "<h5>this field should not be blank</h5>";   

} else{ 

$query = "INSERT INTO categories(cat_title) ";    
$query .= "VALUES('{$cat_title}')";
$result = mysqli_query($connection,$query);

if(!$result){

die('QUERY FAILED'.mysqli_error($connection));
       }    
   }

}  
   
    
          }



function update_cat(){
   global $connection;
    
          
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<tr>";
echo "<td>{$cat_id}</td>";
echo"<td>{$cat_title}</td>";
    
            ////////    EDIT AND DELETE LINKS/////////
    
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";

echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
</tr>";

}  
    
    
    
          }




function delete_cat(){
    global $connection;
 
    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
   $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} "; 
     $delete_query = mysqli_query($connection,$query);
//     header("location: categories.php");
//     header("location:categories.php");
     
 }           
    
    
    
    
    }



function user_image(){
    
  global $connection; 
    
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
                                             
 echo"<td><img src='user_image/$user_image'alt='image'height='50'id='imgg'></td>";             
    
   
}


?>
 