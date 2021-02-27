<?php include "db.php";?>
  <style>  
      .color{
         color: green;
      }   

      .color2{
         color: lightcoral;
      }  
     
</style>
   
<div class="well">
<h4>Recent Activity</h4>
<ul class="activitiez">
 
   <?php

$query = "SELECT * FROM posts LIMIT 100 ";

$slect_resent_post_query = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($slect_resent_post_query)){
   $post_id = $row['post_id']; 
$post_title = $row['post_title'];
$post_image = $row['post_image'];
 $post_date = $row['post_date'];
$post_author = $row['post_author'];


   ?>
   
 
                <li>
                <div class="activity-meta">
                <img src="./admin/images/<?php echo $post_image; ?>"height="30px">
                <i><?php echo $post_date ; ?></i>
                <br>
                <a id="color" href="post.php?p_id=<?php echo $post_id; ?>"><?php echo "$post_title";?></a>

                <h6>by <a class="color" href="index.php"><?php echo $post_author; ?></a></h6>
                </div>
                </li>
                <?php }?> 

                </ul>
                </div><!-- recent activites -->


      
      

                                  
                                  
                                  
                                   
                                          
                                            
                                                
<!--
<div class="well">

<h3 class="color">Resent posts</h3>


<?php
//
//$query = "SELECT * FROM posts LIMIT 100 " ;
//
//$slect_resent_post_query = mysqli_query($connection,$query);
//while($row = mysqli_fetch_assoc($slect_resent_post_query)){
//$post_title = $row['post_title'];
//$post_image = $row['post_image'];
//
//echo"<img src='admin/images/$post_image'height='30'class='widgetimage'>";
//
//echo "<p class='text'>";
//echo $post_title;
// echo "</p>";    
//
//}
?>
 
</div>
-->
