<?php session_start(); 
  include_once 'header.php';
  require_once 'config.inc.php';
 ?>

<div class="container">
  <h2 id="addnewh"> Add a photo </h2>
    <form method="post"  action='add_photo.php' enctype="multipart/form-data" class="form-horizontal"> 
        <table class="table table-bordered table-responsive"> 
          <tr>
           <td><label class="control-label">Profile Img.</label></td>
              <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
          </tr>
          <tr>
              <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
              <span class="glyphicon glyphicon-save"></span> &nbsp; save
              </button>
              </td>
          </tr>
        </table>
    </form>
</div>

<?php
  if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){


   error_reporting( ~E_NOTICE ); // avoid notice
  
   
   if(isset($_POST['btnsave'])){
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    if(empty($imgFile)){
     $errMSG = "Please Select Image File.";
    } else {
     $upload_dir = 'user_images/'; // upload directory
   
     $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
     // valid image extensions
     $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
     // rename uploading image
     $userpic = rand(1000,1000000).".".$imgExt;
      
     // allow valid image file formats
     if(in_array($imgExt, $valid_extensions)){   
      // Check file size '5MB'
          if($imgSize < 5000000)    {
           if (move_uploaded_file($tmp_dir,$upload_dir.$userpic)){
              echo "No errows!";
               $stmt = $conn->prepare('INSERT INTO tbl_users (userPic) VALUES (:upic)');
               $stmt->bindParam(':upic',$userpic);
               
               if($stmt->execute()){
                $successMSG = "new record succesfully inserted ...";
                echo  '<h2 class ="text-center"> The file has been uploaded.</h2>' ;
               } else {
                $errMSG = "error while inserting....";
               }
            }
          } else {
           $errMSG = "Sorry, your file is too large.";
          }
         } else {
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
     } 
  }}}
?>