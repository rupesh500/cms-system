 <?php 



$connection = mysqli_connect('localhost','root','','website');
   if(!$connection){
       die("QUERY FAILED" . mysqli_error($connection));
       
   }

  ?>
