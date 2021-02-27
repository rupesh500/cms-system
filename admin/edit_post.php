
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
        
           <div style="color: brown;">
        
               <fieldset><legend><h1>Edit post</h1></legend></fieldset>
         
         </div>
         
         
  <?php
         
  if(isset($_GET['p_id'])){

  $post_id = $_GET['p_id'];
      

     $query = "SELECT * FROM posts WHERE post_id = '{$post_id}' ";                 
   $select_post_by_id = mysqli_query($connection,$query);            
   while($row = mysqli_fetch_assoc($select_post_by_id)){
          $post_id = $row['post_id'];
          $post_author = $row['post_author'];
            $post_cat_id = $row['post_cat_id'];
          $post_title = $row['post_title'];
       
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_tags = $row['post_tags'];
          $post_content = $row['post_content'];
          $post_comment_count = $row['post_comment_count'];
          $post_date = $row['post_date'];
   
   }
       

  }
      
      
  
  ?>  
        
        
   <?php
         
                //     FINALLY UPDATE POSTS/////
   
if(isset($_POST['submit'])){
 
 $post_title = $_POST['post_title'];
 $post_cat_id = $_POST['post_cat_id'];
 $post_author = $_POST['post_author'];
  $post_status = $_POST['post_status'];
   $post_tags = $_POST['post_tags'];
     $post_content = $_POST['post_content'];
    
     $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($post_image_temp, "images/$post_image" );
    
//    WHEN EMPTY IMAGE THEN POST DEFAULT IMAGE 
    if(empty($post_image)){
      $query = "SELECT * FROM posts WHERE post_id = $post_id "; 
       $select_image = mysqli_query($connection,$query); 
        
        while($row = mysqli_fetch_array($select_image)){
            
         $post_image = $row['post_image'];
            
        }
        
    }
    
    
        
  $query = "UPDATE posts SET ";
  
     $query .="post_title = '{$post_title}', ";
     $query .="post_cat_id = '{$post_cat_id}', ";
     $query .="post_date = now(), ";
     $query .="post_author = '{$post_author}', ";
     $query .="post_status = '{$post_status}', ";
     $query .="post_tags = '{$post_tags}', ";
     $query .="post_content = '{$post_content}', ";
     $query .="post_image = '{$post_image}' ";
     $query .= "WHERE post_id = {$post_id} ";
    
    
  
    $update_post  = mysqli_query($connection,$query);
    if(!$update_post){
      die("QUERY FAILED" . mysqli_error($connection));  
        
    }
    
 echo "<p class='bg-success'>Post Updated: <a href='../post.php?p_id={$post_id}'>view post</a>  or  <a href='view_all_posts.php'>Edit more posts</a></p>";    
    
}
        
         
?>      
      
                       
 
        <label for="post_title">post title</label>
      <input value="<?php echo $post_title ;?>" type="text"class="form-control"name="post_title">
   </div>     
        
        
     <div class="form-group">

     <select name="post_cat_id" id="">
       
        <?php
         
//         OPTION CATEGORY IN EDIT POSTS   ////
         
$query = "SELECT * FROM categories ";
$select_categories = mysqli_query($connection,$query);
         
  if(!$select_categories){
   die("QUERY FAILED" . mysqli_error($connection));   
      
        }       

while($row = mysqli_fetch_assoc($select_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
      
   echo "<option value='$cat_id'>$cat_title</option>"; 
    
    }
              
 ?> 

     </select>
   </div> 


   
     <div class="form-group">
        <label for="post_author">post author</label>
      <input value="<?php echo $post_author ;?>" type="text"class="form-control"name="post_author">
   </div> 
       
     <div class="form-group">
        <label for="post_status">post status</label>
      <input value="<?php echo $post_status ;?>" type="text"class="form-control"name="post_status">
   </div> 
       
  
     
        
     <div class="form-group">
        <label for="post_image">post image</label>
      <img src="images/<?php echo $post_image?>" alt=""width="100"name="image">
  <input type="file"name="image">
   </div> 
       
       
     <div class="form-group">
        <label for="post_tags">post_tags</label>
      <input value="<?php echo $post_tags ;?>" type="text"class="form-control"name="post_tags">
   </div> 
       
     
        
     <div class="form-group">
        <label for="post_cantent">post content</label>
      <textarea class="form-control"name="post_content"id=""cols="30"rows="10">
   
         <?php echo $post_content ;?>
        
         </textarea>
      
      </div> 
   

           <div class="form-group">
    <input class="btn btn-succsess" type="submit"name="submit"value="Update Post">
  
         </div>
             </form>    
   
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
     