<body>


<?php include"header.php";?>
 <?php include"db.php";?>
        
         
           <!-- Navigation -->

<?php include"navigation.php";?>
  
  
    
        <!-- Page Content -->
    <div class="container">

        <div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">




<?php
    
 if(isset($_GET['category'])){
     
  $post_cat_id = $_GET['category'];  
   

$query = "SELECT * FROM posts WHERE post_cat_id = $post_cat_id";
 $all_posts_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($all_posts_id)){
        
     $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
//        $post_tags = $row['post_tags'];
//        $post_comment_count = $row['post_comment_count'];
//        $post_status = $row['post_status'];

    ?>
        
   
    
   
<h1 class="page-header">
Page Heading
<small>Secondary Text</small>
</h1>

<!-- First Blog Post -->
<h2>
<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "$post_title";?></a>
</h2>
<p class="lead">
by <a href="index.php"><?php echo "$post_author"; ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span><?php echo "$post_date";?></p>
<hr>
<img class="img-responsive" src="admin/images/<?php echo $post_image;?>" alt="">
<hr>
<p><?php echo "$post_content";?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
                      <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

    
    
      
    <?php  } }?>


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
        