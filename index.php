<?php include"header.php";?>
 <?php include"db.php";?>
       <!-- Navigation -->
       
<?php include"navigation.php";?>

  <body>
  
<!--      right bottom message filed here-->
      
      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c36c493361b3372892f4fbe/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->                                   
                                         

<!--    LEFT SIDE COLOR TOOLS-->
  	<div class="tools">
		<span class="toggle"><img src="r/tools/rupesh.png" class="img-responsive" alt=""></span>
		<a href="" class="color-blue">Blue</a>
		<a href="" class="color-green">Green</a>
		<a href="#" class="color-orange">Orange</a>
		<a href="#" class="color-sienna">Sienna</a>
		<a href="#" class="color-turquoise">Turquoise</a>
		<a href="#" class="color-light-blue">Light Blue</a>
	</div>

   <div class="image">
  
        <!-- Page Content -->
    <div class="container">

        <div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">

<?php
//    SHOW and LIMIT HOW MANY POST AT A ONE PAGE IN INDEX>PHP 
   if(isset($_GET['page'])){
    $page = $_GET['page']; 
   } else{
       
       $page = "";
     }
    
    if($page == "" || $page == 1){
        
        $page_1 = 0;
       }else{
     $page_1 = ($page * 5) - 5;
        
    }
    
    $post_query_count = "SELECT * FROM posts"; 
    $find_count = mysqli_query($connection, $post_query_count);
    $count = mysqli_num_rows($find_count);
    $count = ceil($count/3);
    
   
        $query = "SELECT * FROM posts LIMIT $page_1, 5";
        $all_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($all_posts)){
        
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

<!-- First Blog Post -->
<h2>
<a id="color" href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "$post_title";?></a>
</h2>
<p class="lead"id="color">
by 


<a href="index.php?author=<?php echo $post_author ; ?>?p_id=<?php echo $post_id; ?>"><?php echo "$post_author"; ?></a>
</p>

<p><span class="glyphicon glyphicon-time"></span><?php echo "$post_date";?></p>
<hr>


<a href="post.php?p_id=<?php echo $post_id; ?>">

 <img class="img-responsive" src="./admin/images/<?php echo $post_image; ?>" alt="image"id="img"></a>
<hr>
<p><?php echo "$post_content";?></p>
<a class="btn btn-primary"href="post.php?p_id=<?php echo $post_id; ?>">Read More</a>
<hr>       
    <?php    }  ?>  
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
      <!--footer.php-->
   <ul class="pager">
   
 <?php

//       PAGER 
 
for($i = 1; $i <= $count; $i++){
    
    echo "<li><a href='index.php?page={$i}'>$i</a></li>";
}
           
 ?>  
 
</ul>  

                               
      
  <?php include "footer.php";?>
        