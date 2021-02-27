
<!DOCTYPE html>
<html lang="en">

<?php include "header.php"; ?>

<body class="sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen">
<div class="loader">
<div class="loader-content">
<div class="spinner-grow align-self-center"></div>
</div>
</div>
</div>
<!--  END LOADER -->



<?php include "admin_navbar.php"; ?>




<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

<div class="overlay"></div>
<div class="search-overlay"></div>




<?php include "admin-left-side-bar.php"; ?>





<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
<div class="layout-px-spacing">

<div id="flStackForm" class="col-lg-8 offset-lg-2 mt-5 layout-spacing layout-top-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-header">
<div class="row">
<div class="col-xl-8 col-md-8 col-sm-8 col-12">
<h4>Insert Product</h4>
</div>
</div>
</div>
<div class="widget-content widget-content-area">




<?php
ini_set('display_errors','on');
error_reporting(E_PARSE);
$status=$_POST['status'];
    
    
  if(isset($_POST['submit'])){
    $product_title = $_POST['product_title']; 
    
      $product_cat = $_POST['product_cat']; 
      $cat = $_POST['cat']; 
     
      $product_prize = $_POST['product_prize']; 
      $product_keyword = $_POST['product_keyword']; 
      $product_desc = $_POST['product_desc']; 
      
          $product_img1 = $_FILES['product_img1']['name'];
          $product_img2 = $_FILES['product_img2']['name'];
          $product_img3 = $_FILES['product_img3']['name'];
      
      $temp_name1 = $_FILES['product_img1']['tmp_name'];
      $temp_name2 = $_FILES['product_img2']['tmp_name'];
      $temp_name3 = $_FILES['product_img3']['tmp_name'];
      
      move_uploaded_file($temp_name1, "product_images/$product_img1");
         move_uploaded_file($temp_name2, "product_images/$product_img2");
         move_uploaded_file($temp_name3, "product_images/$product_img3");
      
     
     $insert_product = "INSERT INTO `products`(`product_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_prize`, `product_desc`, `product_keyword`) VALUES ('$product_cat','$cat',now(),'$product_title','$product_img1','$product_img2','$product_img3','$product_prize','$product_desc','$product_keyword') "; 
      
  $result_query = mysqli_query($connection,$insert_product);
     
header("location: insert_product.php");
 
      if(!$result_query){
          die("QUERY FAILED" . mysqli_error($connection));
          
      }
      

      
  } 
  

    ?>














<form action="insert_product.php" method="post" enctype="multipart/form-data">

<div class="form-group mb-3">

<input type="text" name="product_title" placeholder="Product title" class="form-control">
</div>



<div class="form-group mb-3">
<select name="product_cat" id="" class="form-control" placeholder="product categories">
<option value="">Select a product Categories</option>

<?php 

$select_product_query = "SELECT * FROM product_categories ";
$result_product = mysqli_query($connection,$select_product_query); 
while($row = mysqli_fetch_array($result_product)){

$p_cat_id = $row['p_cat_id'];
$p_cat_title = $row['p_cat_title'];

echo "<option value='$p_cat_id' $p_cat_title > $p_cat_id) $p_cat_title</option>"; 

}                                   
?>


</select>
</div>



<div class="form-group mb-3">

<input type="file" name="product_img1" required="" placeholder="product image 1">
</div>


<div class="form-group mb-3">

<input type="file" name="product_img2" required="" placeholder="product image 2">
</div>



<div class="form-group mb-3">

<input type="file" name="product_img3" required="" placeholder="product image 3">
</div>




<div class="form-group mb-3">
<select name="cat" id="" class="form-control" placeholder="product categories">
<option value="">Select Categories</option>
<?php 

$select_categories = "SELECT * FROM categories ";
$categories_result = mysqli_query($connection,$select_categories); 
while($row = mysqli_fetch_array($categories_result)){

$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<option value='$cat_id' $cat_title > $cat_id) $cat_title</option>"; 

}  

?>

</select>
</div>


<div class="form-group mb-3">

<input type="text" name="product_prize" placeholder="Product prize" class="form-control">
</div>



<div class="form-group mb-3">

<input type="text" name="product_keyword" placeholder="Product keyword" class="form-control">
</div>

<div class="form-group mb-3">

<textarea name="product_desc" id="" class="form-control" cols="10" rows="5" placeholder="product Description here">

</textarea>
</div>

<!--                <button type="submit" class="btn btn-primary mt-3">Submit</button>-->
<input type="submit" name="submit" value="submit" class="btn btn-primary mt-3" >    
</form>


</div>
</div>
</div>

</div>




<?php include "footer.php"; ?>