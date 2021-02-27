<?php include"db.php"; ?>
<?include"header.php";?>
<style>

    #font{
      font-family: monospace;
    }

    #admin{
        color: white;
    }
 
</style>
   <div id="font">
   

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
         
 <a class="navbar-brad" href="index.php"><img src="images/logo1.png"height="50"></a>
 </div>
     
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">        
<?php
              
 $query = "select * from categories";
$select_categories = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
    
     /////////***********ACTIVE LINK WHEN CLICK*************///////////
    
    $category_class = '';
    $register_class = '';
    
    $pagename = basename($_SERVER['PHP_SELF']);
     
    if(isset($_GET['category']) && $_GET['category'] == $cat_id){
        
      
        $category_class = 'active';
    }
    else{
      $register_class = 'active'; 
    }

  echo "<li class='$category_class'><a href='category.php?category=$cat_id'>$cat_title</a></li>"; 
}                    
 ?>

   <li class="<?php echo $register_class; ?>"> <a href="register.php">Ragister User</a> </li>

       <li> <a href="contact_us.php"class="contact">contact</a> </li>
        <li> <a href="admin/admin_index.php"id="admin">Admin</a>
        </li>
          <li> <a href="about_me.php"id="about">About Me</a>
        </li> 
        </ul>
         </div>
             <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
