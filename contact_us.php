<?php  include "db.php"; ?>
 <?php  include "header.php"; ?>

    <!-- Navigation -->

    <?php  include "navigation.php"; ?>
 <?php

if(isset($_POST['send'])){
    
     $to      = "rupeshnarkar500@gmail.com";
     $subject = $_POST['subject'];
     $body    = $_POST['body'];
 
    
  mail($to,$subject,$body);
}
?>
  
    <!--    LEFT SIDE COLOR TOOLS-->
  
        <div class="container">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
          
                <div class="form-wrap">
                
                <center>
                <h1 class="color">Contact me</h1> 
                    </center>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                    <center>
     
                     
                         <div class="form-group">
                              
                            <input type="email" name="email" id="rohini" class="form-control" placeholder="somebody@example.com">
                        </div>
                        
                         
                              <div class="form-group">
                            <input type="text" name="subject"class="form-control" placeholder="Enter subject"id="rohini">
                        </div>

        <div class="form-group">
       
      <textarea class="form-control"name="body"id=""cols="5"rows="10"id="rohini">
   
         </textarea>
      
      </div> 
                        
             
                        <input type="submit" name="send" id="btn-login" class="btn btn-success" value="Send Message">
                        </center>
            
                    </form>
                    
            
               
                </div>
                </div>

               
        </div> 
        </div> <!-- /.row -->
        </div> <!-- /.row -->
    
    
    
    

        <hr>

<?php include "footer.php";?>
