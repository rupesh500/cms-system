
<?php include "db.php";?>

<?php session_start();?>
<?php
if(isset($_POST['login'])){
 $username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($connection,$username); 
$password = mysqli_real_escape_string($connection,$password); 
    
 $query = "SELECT * FROM users WHERE username = '{$username}' ";   
    $select_user_query = mysqli_query($connection,$query);
    
    if(!$select_user_query){
     die("QUERY FAILED" . mysqli_error($connection));   
 }}
//      COMPARE KAREL UPPPER USENAME && PASS SAME AHE KI NAHI TE
while($row = mysqli_fetch_array( $select_user_query)){
  $db_user_id = $row['user_id'];
  $db_username = $row['username'];
  $db_password= $row['password'];
  $db_user_firstname = $row['firstname'];
  $db_user_lastname = $row['lastname'];
 $db_user_image = $row['user_image'];
  $db_user_role = $row['role'];
}
if($username === $db_username && $password === $db_password){
  

      $_SESSION['db_username'] =  $db_username;
      $_SESSION['db_password'] =  $db_password;
      $_SESSION['db_user_firstname'] =  $db_user_firstname;
      $_SESSION['db_user_lastname'] =  $db_user_lastname;
      $_SESSION['db_user_role'] =  $db_user_role;
     $_SESSION['db_user_image'] =  $db_user_image;
    
 header("location:admin/admin_index.php");
}else{
header("location:index.php");
}


?>

