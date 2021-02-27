<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php";?>

<?php include "function.php"; ?>



<body>
    <style>
        .box {
            height: 900px;
            width: 1075px;
            border: 1px solid grey;
            box-shadow: 1px 1px 10px grey;
        }
        .user_image {
            margin-left: 20px;
            margin-top: 20px;
            height: 300px;
            width: 300px;


        }

        .image_side_text {

            margin-left: 100px;



        }


        #div:hover {

            color: black;
            box-shadow: 10px 1px 40px 2px grey;

        }



        #div {
            transition: all 1s;
        }

        #div:hover {

            transform: scale(1.1);
            color: black;

        }

        .online {
            color: green;
        }

    </style>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include"includes/admin_navigation.php";?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" "col-md-4" "col-sm-3">

                        <h1 class="page-header">
                            Welcome to Admin
                            <small>
                                <?php echo $_SESSION['db_user_firstname'];?>

                            </small>

                        </h1>
                        <h3>
                            User Online:
                            <?php echo users_online();?>
                        </h3>


                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row admin widget -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary" id="div">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                      $query = "SELECT * FROM posts";                      
                        $show_all_posts = mysqli_query($connection,$query);                    
                         $post_count = mysqli_num_rows($show_all_posts); 

                       ?>

                                        <div class='huge'>
                                            <?php echo $post_count?>
                                        </div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="view_all_posts.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green" id="div">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">


                                        <?php

              $query = "SELECT * FROM comments";                      
                $show_all_comments = mysqli_query($connection,$query);                    
                 $comment_count = mysqli_num_rows($show_all_comments); 

               ?>

                                        <div class='huge'>
                                            <?php echo $comment_count ?>
                                        </div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="view_all_comments.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow" id="div">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
              $query = "SELECT * FROM users";                      
                $show_all_users = mysqli_query($connection,$query);                    
                 $users_count = mysqli_num_rows($show_all_users); 

               ?>



                                        <div class='huge'>
                                            <?php echo $users_count ?>
                                        </div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="view_all_users.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red" id="div">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php

              $query = "SELECT * FROM categories";                      
                $show_all_categories = mysqli_query($connection,$query);                    
                 $cat_count = mysqli_num_rows($show_all_categories); 

               ?>

                                        <div class='huge'>
                                            <?php echo $cat_count ?>
                                        </div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="categories.php">View Details</a></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>  
<!--  end row classs -->



      
      
      
<!--           LINE MAP FLOWCHART HERE-->
      
      <div class="col-lg-3 col-md-6">
     <div class="panel-heading">  
      <div class="row">

 
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
      <?php
//     ARRAY
  $element_text = ['active posts','categories','users','comments']; 
                                            
                                            
 $element_count = [$post_count,$cat_count,$users_count,$comment_count];   
                                            
   for($i = 0; $i < 4; $i++) {
     
   echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";  
       
       
   }                                        
    
      ?>
  
            
        
            
     
        ]);

        var options = {
          width: 900,
          legend: { position: 'none' },
          chart: {
            title: '',
            subtitle: '' },
          axes: {
            x: {
              1: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
      
       
    
    <div id="top_x_div" style="width:auto; height:450px;"></div>  
          
     
     
     
 </div>         
         
  

            </div>

            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</body>

</html>
