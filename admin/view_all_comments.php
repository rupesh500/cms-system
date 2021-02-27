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
                 

                 
       <h1 class="page-header">
     
     Welcome to admin
           <small>author</small> </h1> 

       <table class="table table-bordered"id="table"><!--CSS box shadow  -->
     <thead>  
         <tr id="back"><!--CSS HEADING COLOR  -->
             <th>ID</th>
             <th>Author</th>
               <th>comment</th>
              <th>Email</th>
                <th>Replay to Comment</th>
             <th>status</th>
                <th>date</th>
             <th>Approve</th> 
                   <th>Unapprove</th>
                   <th>delete</th>
             
         </tr>
     </thead> 
<tbody>

<!--//DELETE COMMENTS QUERY-->

<?php
    
 
       
if(isset($_GET['approved'])){
 $comment_id = $_GET['approved'];

    
    $query ="UPDATE comments SET comment_status ='approved' WHERE comment_id ='$comment_id' ";
  
    $show_comments = mysqli_query($connection,$query);
  
}

 if(isset($_GET['unapproved'])){
 $comment_id = $_GET['unapproved'];
 $query ="UPDATE comments SET comment_status ='unapproved' WHERE comment_id ='$comment_id' ";
  
    $Hide_Comments = mysqli_query($connection,$query);
  
}    

    
if(isset($_GET['delete'])){
 $comment_id = $_GET['delete'];
 $query = "DELETE FROM comments WHERE comment_id = $comment_id";
  $view_All_post = mysqli_query($connection,$query);
  
}    
 
 ?>  
  


  <?php
    
 
 $query = "SELECT * FROM comments";
  $select_comment = mysqli_query($connection,$query);
  
   while($row = mysqli_fetch_assoc($select_comment)){
     
$comment_id = $row['comment_id']; 
 $comment_post_id = $row['comment_post_id'];
$comment_Author = $row['comment_Author'];
$comment_email = $row['comment_email'];
$comment_content = $row['comment_content'];
$comment_status = $row['comment_status'];
$comment_date = date('d-m-y');

echo"<tr>"; 
       
       echo "<td>$comment_id</td>";   
   
       echo "<td class='author'>$comment_Author</td>";
      
       echo "<td>$comment_content</td>";
       echo "<td>$comment_email</td>";
       
//        GO TO SPECIFIC COMMENT QUERY
       
       $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
       $go_to_comment = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($go_to_comment)){
      $post_id = $row['post_id']; 
           $post_title = $row['post_title']; 
       
          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td>";  
           
       }
    ?>
       
       <?php
       
      
       echo "<td class='approved'>$comment_status</td>";
      
       echo "<td>$comment_date</td>";
       
       
       
       echo "<td><a href='view_All_comments.php?approved=$comment_id'class='approved'>approved</a></td>";
       
       

       echo "<td><a href='view_All_comments.php?unapproved=$comment_id'class='unapproved'>unapproved</a></td>";
       
       

 echo "<td><a href='view_all_comments.php?delete={$comment_id}'>Delete</a></td>";

echo"</tr>";
       
  
   } 

    
 ?>
 

 
 <?php
 if(isset($_GET['delete'])){
    $comment_id = $_GET['delete'];
   $query = "DELETE FROM comments WHERE comment_id = {$comment_id} "; 
     $delete_query = mysqli_query($connection,$query);
//     header("location:categories.php");
     
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
    
