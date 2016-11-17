<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jenny May</title>
   
    <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
 <?php
  include_once 'config.inc.php';
  include_once 'header.php';
 ?>
<div id="portfolio">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <ul class="bxslider"> 
          <?php
           $stmt = $conn->prepare('SELECT userID, userPic FROM tbl_users ORDER BY userID DESC');
           $stmt->execute();
           
            if($stmt->rowCount() > 0) {
              $i = 0;
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
          ?>
            <li> 
            <img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded"/>
            <?php 
              if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){
                echo '<p class="page-header">';
                echo '<span>';
                echo '<a class="btn btn-danger" href="delete.php?delete_id=' . $row['userID'] . '" title="click for delete" onclick="return confirm(\'sure to delete ?\')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>';
                echo '</span>';
                echo '</p>';
              }
            ?>
            </li>
           <?php
           $i++;
          }
           }
           else
           {
            ?>
            <div class="col-xs-12">
               <div class="alert alert-warning">
                  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
               </div>
            </div>
            <?php
           }
          ?>
        </ul>
        <div id="bx-pager">
          <div class="slider1">
              <?php
              $stmt->execute();
              if($stmt->rowCount() > 0) {
                  $i = 0;
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                  extract($row);
              ?>
                 <div class="slide"><a data-slide-index="<?php echo $i;?>" href=""><img width="90" height="90" src="user_images/<?php echo $row['userPic']; ?>" /></a></div>
              <?php
                  $i++;
                }
              }
              ?>
            </div>
        </div>  
      </div><!--row-->
    </div><!--col-->
  </div> <!--container-->
</div>

<!--==============================FOOTER=============================================-->
    <footer class="footer">
        <div class="container">
          <p class="text-muted">&copy; MakeUp by JMay <?php echo date("Y"); ?> </p>
        </div>
    </footer>
  
      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <!-- jQuery library (served from Google) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="/js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="/css/jquery.bxslider.css" rel="stylesheet" />





      <script src="js/bootstrap.js"></script>
      <script src="js/script.js"></script>
    <script src="js/tiltfx.js"></script>
  </body>
</html>

