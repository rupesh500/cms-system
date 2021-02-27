<?php include"db.php";?>





<?php


$query = "SELECT * FROM categories";
$select_blog_categories = mysqli_query($connection,$query);
                     
?>
  
      <div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
<ul class="activity-meta">
<!--   <div class="activity-meta">-->
   

    
<?php  
    
 while($row = mysqli_fetch_assoc($select_blog_categories)){

    
$cat_id = $row['cat_id'];  
$cat_title = $row['cat_title'];

echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";

}

?> 
    
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
