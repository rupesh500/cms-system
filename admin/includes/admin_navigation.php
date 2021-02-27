<?php include "db.php";?>
<style>

    #nav_bar:hover{
       color: darkorange;
    }
    
    
    </style>


           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_index.php">Admin</a>

            </div>
         
            
              <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <a class="navbar-brand" href="#"id="nav_bar">Users Online:
                          <?php echo users_online();?>   
                </a>
             
                
                 <a class="navbar-brand" href="../index.php">Home page</a>
       
       
     
             
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
     <?php echo $_SESSION['db_user_firstname'];?>
    
    
    <i class="fa fa-user"></i>  <b class="caret"></b></a>
     
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profiles.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                        </li>
                       
                      
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            


<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
    <li>
        <a href="admin_index.php"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
    </li>

  

        <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> posts <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="posts_dropdown" class="collapse">
            <li>
                <a href="../admin/view_all_posts.php">view all posts</a>
            </li>
            <li>
                <a href="add_post.php">add post</a>
            </li>
        </ul>
    </li>


                   
                    
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> categories</a>
                    </li>
                  
                    
                    <li>
                        <a href="./view_all_comments.php"><i class="fa fa-fw fa-file"></i>comments</a>
                    </li>
                  
              <li> 
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>users<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./view_all_users.php">View all users</a>
                            </li>
                            <li>
                                <a href="./add_user.php">add Users</a>
                            </li>
                    
                        </ul>
                    </li>
                    
                  <li>
                        <a href="./profiles.php"><i class="fa fa-fw fa-file"></i> profiles</a>
                    </li>
                 
                    
                    
                  </div>
                  
            <!-- /.navbar-collapse -->
        </nav>
