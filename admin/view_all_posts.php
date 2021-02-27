  <?php include"includes/db.php";?>
    <?php include "includes/admin_header.php";?>
     <?php include "function.php";?>
  

 <?php $connection = mysqli_connect('localhost','root','','website'); ?>

 <head>
<!--       CUSTUM MY CSS FILE-->
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
             <small><?php echo $_SESSION['db_user_firstname'];?></small> </h1>   



    
      <table class="table table-bordered table-hover"id="table">
        <thead id="heading_color">
      <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>view post</th>
                <th>Tags</th>
                <th>views</th>
                <th>Comment Count</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
         
        </thead>  
           <tbody>
       
<?php

    $query = "SELECT * FROM posts ";             
               
   $show_all_posts = mysqli_query($connection,$query);            
   while($row = mysqli_fetch_assoc($show_all_posts)){
          $post_id = $row['post_id'];
          $post_author = $row['post_author'];
          $post_title = $row['post_title'];
          $post_cat_id = $row['post_cat_id'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_tags = $row['post_tags'];
          $post_comment_count = $row['post_comment_count'];
          $post_date = $row['post_date'];
       $post_views_count = $row['post_views_count'];
       

      echo "<tr class='warning'>";
       
   
       
       echo"<td>$post_id</td>";
       echo"<td>$post_author</td>";
       echo" <td>$post_title</td>";
       
       
//       SHOW CAT TITLE IN SHOW ALL POSTS TBALE
       
      $query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id}";
$select_categories_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_categories_id)){
  
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
  

       
     echo"<td>{$cat_title}</td>"; 
 
}
       
       
       
       echo"<td>$post_status</td>";
       echo"<td><img src='images/$post_image'alt='image'height='50'class='img'></td>";
       
       
////// view post link query////
       
echo"<td><a href='../post.php?p_id={$post_id}'>View post</a></td>";
       
       
     
       
       echo"<td>$post_tags</td>";
       
        echo"<td><a href='view_all_posts.php?reset={$post_id}'>$post_views_count</td>";
       
       
//         GO TO SPECIFIC COMMENT PAGE
       $query = "SELECT * FROM COMMENTS WHERE comment_post_id = $post_id";
       $send_comment_query = mysqli_query($connection,$query);
            $row = mysqli_fetch_array($send_comment_query); 
    $comment_id = $row['comment_id'];
       
       $comment_count = mysqli_num_rows($send_comment_query);
       
       
       echo"<td><a href='post_comments.php?id={$post_id}'>$post_comment_count</a></td>";
       
      
     
       
       echo"<td>$post_date</td>";
     echo"<td><a href='edit_post.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
       
     echo"<td><a OnClick=\" javascript:return confirm('Are you sure Delete it?');  \" href='view_all_posts.php?delete={$post_id}'>Delete</></td>";
      echo "</tr>";             
   
   } 


               
   
               
               
 ?>
       
    <?php
//          ////DELETE POST QUERY////////////////
       if(isset($_GET['delete'])){
     
     $post_id = $_GET['delete'] ;
         
     $query = "DELETE FROM posts WHERE post_id = $post_id ";    
      $delete = mysqli_query($connection, $query);
           
           header("location:view_all_posts.php");
        if(!$delete){
            die("QUERY FAILED" . mysqli_error($connection));
            
        }   
           
       }        
          
    ?>  
        
             
  <?php
//   RESET POST VIEW COUNT            
       if(isset($_GET['reset'])){
     
     $post_id = $_GET['reset'] ;
         
     $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = '{$post_id}'";    
      $delete = mysqli_query($connection, $query);
           
           header("location:view_all_posts.php");
        if(!$delete){
            die("QUERY FAILED" . mysqli_error($connection));
            
        }   
           
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
     