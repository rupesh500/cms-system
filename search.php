<style>
  .not_found{
   margin-top: 100px;
     width: 50%;
      margin-left: 120px;
}
    .oops{
        margin-top: 6px;
  margin-left: 200px;
    }
  
</style>



<?php include"header.php";?>
 <?php include"db.php";?>
       <!-- Navigation -->
       
<?php include"navigation.php";?>
   <body>
    <div class="image">
        <!-- Page Content -->
      <div class="container">
        <div class="row">
<!-- Blog Entries Column -->
<div class="col-md-8">

<?php
   
   if(isset($_POST['submit'])){
    
$search = $_POST['search']; 
 $query = "SELECT * FROM posts WHERE post_tags  LIKE '%$search%' ";   
    $select_query = mysqli_query($connection,$query);
    if(!$select_query){
      die("QUERY FAILED" . mysqli_error($connection));         
       }  
           $count = mysqli_num_rows($select_query);
            if($count == 0){
                
                
             echo "<img class='not_found' src='images/404.svg'height='200px'>"; 
                echo "<h1 class='oops'>";
                echo "Whoops! 404";
                
                 echo "</h1>";
                
                
                
        }else{
             while($row = mysqli_fetch_assoc($select_query)){    
             $post_id = $row['post_id'];
            $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
         $post_image = $row['post_image'];
         $post_content = $row['post_content'];

 ?>

<h1 class="page-header">
Page Heading
<small>Secondary Text</small>
</h1>

<!-- First Blog Post -->

   <h2>
     <a class="color" href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "$post_title";?></a>
     </h2>
     <p class="lead">
       by
        <a href="index.php".php?author=<?php echo $post_author ; ?>?p_id=<?php echo $post_id; ?>"><?php echo "$post_author"; ?></a>
         </p>
           <p><span class="glyphicon glyphicon-time"></span><?php echo "$post_date";?></p>
 <hr>
            <a href="post.php?p_id=<?php echo $post_id; ?>">
             <img class="img-responsive" src="./admin/images/<?php echo $post_image; ?>" alt="image"id="img"></a>
              </a>
<hr>
                <p><?php echo "$post_content";?></p>
                  <a class="btn btn-primary"href="post.php?p_id=<?php echo $post_id; ?>">Read More</a>

<hr>
        
   <?php }}}?>   

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
      </div>
      <!--footer.php-->
      </body>
      
  <?php include "footer.php";?>
        