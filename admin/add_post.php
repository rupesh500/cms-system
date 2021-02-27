
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
 $post_title = $_POST['post_title'];
   $post_cat_id = $_POST['post_cat_id'];
     
         $post_author = $_POST['post_author'];

      $post_status = $_POST['post_status'];
    
     $post_tags = $_POST['post_tags'];
        
      $post_content = $_POST['post_content'];

    
//     $post_comment_count = $_POST['post_comment_count'];
    
    $post_date = Date('d-m-y');
    
          $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name'];
    
    
    move_uploaded_file($post_image_temp, "images/$post_image" );
      
    
    
    if(empty($post_title) && empty($post_tags)){
        
     echo "this filed should not be Empty";   
        
    } else{
 
     
 $query = "INSERT INTO posts(post_title,post_cat_id,post_author,post_status,post_tags,post_content,post_date,post_image) ";
  $query .= "VALUES('$post_title','$post_cat_id','$post_author','$post_status','$post_tags','$post_content',now(),'$post_image')";  
 $result = mysqli_query($connection,$query);
  
    if(!$result){
        
    die("QUERY FAILED");    
        
    }
    
     echo "Post Added: " . " " . "<a href='view_all_posts.php'>view posts</a> ";  
    
    
}
            
}
?>

                                                                                       
     <form action=""method="post"enctype="multipart/form-data">
  
   
     <div class="form-group">
        
           <div style="color: brown;">
        
               <fieldset><legend><h1>Add post</h1></legend></fieldset>
         
         </div>
         
         
         
        <label for="post_title">post title</label>
      <input type="text"class="form-control"name="post_title">
   </div>     
        
        

         <div class="form-group">
      <select name="post_cat_id" id=""class="form-control">
         
        
<!--        SHOW CATEGORY IN ADD POST SECTION-->
        
        <?php
              $query = "SELECT * FROM categories WHERE cat_id = cat_id ";
$select_categories_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_categories_id)){
  
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
    
    echo "<option value='$cat_id'>$cat_title</option>";

}
      
  ?>
        
  
             </select></div>
   
     <div class="form-group">
        <label for="post_author">post author</label>
      <input type="text"class="form-control"name="post_author">
   </div> 
       
     <div class="form-group">
        <label for="post_status">post status</label>
      <input type="text"class="form-control"name="post_status">
   </div> 
       
  
     
        
     <div class="form-group">
        <label for="post_image">post image</label>
      <input type="file" name="image">
   </div> 
       
       
     <div class="form-group">
        <label for="post_tags">post_tags</label>
      <input type="text"class="form-control"name="post_tags">
   </div> 
       
     
        
     <div class="form-group">
        <label for="post_cantent">post content</label>
      <textarea class="form-control"name="post_content"id=""cols="30"rows="10">
   
         </textarea>
      
      </div> 
       
           <div class="form-group">
    <input class="btn btn-primary" type="submit"name="submit"value="submit">
  
         </div>
 
                </form>
           
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php";?>
     