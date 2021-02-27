<?php include"header.php";?>
 <?php include"db.php";?>
<?php include"navigation.php";?>
  
  <style>

      #chat{
       background-color: aliceblue;
          width: 300px;
          color: black;  
      }
</style>

        <!-- Page Content -->
    <div class="container">

        <div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">

<?php
    
 if(isset($_GET['p_id'])){
     
  $post_id = $_GET['p_id'];
    $post_author = $_GET['post_author']; 

            
$query = "SELECT * FROM posts WHERE post_author = '{$post_author}' ";
 $all_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($all_posts)){
        
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

    }
        
   ?> 
    

<h1 class="page-header">
Page Heading
<small>Secondary Text</small>
</h1>

<!-- First Blog Post -->
<h2>
<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?>
    </a>
</h2>
<p class="lead">
by <a href="index.php"><?php echo "$post_author"; ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span><?php echo "$post_date";?></p>
<hr>
<img class="img-responsive" src="./admin/images/<?php echo $post_image; ?>" alt="image">
<hr>
<p><?php echo "$post_content";?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                       <?php    }  ?>
                    <!-- Pager -->
                    <ul class="pager">
                    <li class="previous">
                    <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                    <a href="#">Newer &rarr;</a>
                    </li>
                    </ul>

    
    
      <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                   
                   
 <?php
 if(isset($_POST['submit'])){
     
      $post_id = $_GET['p_id']; 

//      $comment_post_id = $_POST['comment_post_id']; 
      $comment_author = $_POST['comment_author']; 
      $comment_email = $_POST['comment_email'];
     
      $comment_content = $_POST['comment_content']; 

     if(empty($comment_email)){
         
        echo"this fileld should not blank" ;
  
     }else{
     
  
    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
     
    $query .= "VALUES('{$post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}' ,'hide',now() ) "; 
     
   $insert_comments = mysqli_query($connection,$query);
     
     
     if(!$insert_comments){
         
        die("QUERY FAILED" . mysqli_error($connection)); 
         
     }
        
//          JEVVA JEVVA COMMENT KAREL TEVVA POST COUNT SEPRATE POST LA DAKHVEL KITI POST AHERT TE VIEW ALL POST MADHE COMMENT_COUNT SHOW HOIL
 $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";        
  $query .= "WHERE post_id = $post_id ";         
    $update_post_comment_count = mysqli_query($connection,$query); 
        }  
                    
 }
                    
  ?>          
                   
                    <h4>Comment:</h4>
                    
                    
            <div class="form-group">
                <lable for="Author"><b>Author</b></lable>
                  <form action=""method="post">
                   <input type="text"name="comment_author"placeholder="Enter username" class="form-control">
                 </div>   
                    
                     <div class="form-group">
                   <lable for="Email"><b>Email</b></lable>
                   <input type="email"placeholder="Enter your Email"class="form-control"name="comment_email">
                 </div>   
                    
                    
                    
                    <form role="form">
                        <div class="form-group">
                              <lable for="Email"><b>Your comment</b></lable>
                            <textarea class="form-control" rows="3"name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger"name="submit"value="submit">Send</button>
                    </form>
                </div>
              
                
               
                <hr>

<!--          SHOW CHATTING STYLE COMMENTS IN POST PAGE-->
               
                <!-- Posted Comments -->
         <?php
    $query = "SELECT * FROM comments WHERE comment_post_id=  '{$post_id}' ";
    $query .= "AND comment_status = 'approved' "; 
        $query .= "ORDER BY comment_id DESC "; 
    $select_comment_query = mysqli_query($connection,$query);
    if(!$select_comment_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_comment_query)){
        
     $comment_date = $row['comment_date'];
     $comment_content = $row['comment_content'];
     $comment_author = $row['comment_Author'];
        
    
        ?>
        
        <!--Comment -->
<div class="media"id="chat">
    <a class="pull-left" href="#">
        <img class="media-object" src="images/avatar.png"height="50" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
           
           
           <?php
            if(isset($_GET['goto'])){
            $post_id = $_GET['goto'];
                header("Location:index.php");
       
            }
            
            ?>
           
           
           
           <?php echo $comment_author;  ?>
           
           
           

            <small><?php echo $comment_date;  ?></small>
        </h4>
      <?php echo $comment_content;  ?>
    </div>
</div>   
  
        
  <?php  } ?>
        

     </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

               
                <!-- Blog Search Well -->
            
                <?php include "sidebar.php";?>


<!-- Blog Categories Well -->

                      <?php include "blog_categories.php";?>

<!-- Side Widget Well -->
            <?php include "widget.php";?>

            
            </div>

        </div>
        <!-- /.row -->

        <hr>

      <!--footer.php-->
  <?php include "footer.php";?>
        