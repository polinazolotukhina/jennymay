<?php session_start(); ?>
<link href="css/bootstrap.css" rel="stylesheet">
<?php
  include_once 'header.php';
 ?>

<div class="container">
  <h2 id="addnewh"> Add a photo </h2>
    <form method="post"  action='addnew.php'  enctype="multipart/form-data" class="form-horizontal">
         
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
<!-- ~~~~~~~~~~~~~~~~~=============INSERT FORM=================~~~~~~~~~~~~~~~~~-->
<?php
  if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){
      

   error_reporting( ~E_NOTICE ); // avoid notice
   require_once 'config.inc.php';
   
   if(isset($_POST['btnsave']))
   {
    
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    
    
    if(empty($imgFile)){
     $errMSG = "Please Select Image File.";
    }
    else
    {
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
       move_uploaded_file($tmp_dir,$upload_dir.$userpic);
      }
      else{
       $errMSG = "Sorry, your file is too large.";
      }
     }
     else{
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
     }
    }
    
    
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
      echo "here";
     $stmt = $conn->prepare('INSERT INTO tbl_users (userPic) VALUES (:upic)');
     $stmt->bindParam(':upic',$userpic);
     
     if($stmt->execute())
     {
      $successMSG = "new record succesfully inserted ...";
      header("refresh:5;index.php"); // redirects image view page after 5 seconds.
     }
     else
     {
      $errMSG = "error while inserting....";
     }
    }
   }
  } else {

  echo '<p> You are not an admin!</p>';
}
?>

<!-- ~~~~~~~~~~~~~~~~~=============EDIT FORM=================~~~~~~~~~~~~~~~~~-->

<?php
  if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){

   error_reporting( ~E_NOTICE );
   require_once 'config.inc.php';
   
   if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
   {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT userName, userProfession, userPic FROM tbl_users WHERE userID =:uid');
    $stmt_edit->execute(array(':uid'=>$id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
   }
   else
   {
    header("Location: index.php");
   }
   
   if(isset($_POST['btn_save_updates']))
   {
    $username = $_POST['user_name'];// user name
    $userjob = $_POST['user_job'];// user email
     
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
       
    if($imgFile)
    {
     $upload_dir = 'user_images/'; // upload directory 
     $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
     $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
     $userpic = rand(1000,1000000).".".$imgExt;
     if(in_array($imgExt, $valid_extensions))
     {   
      if($imgSize < 5000000)
      {
       unlink($upload_dir.$edit_row['userPic']);
       move_uploaded_file($tmp_dir,$upload_dir.$userpic);
      }
      else
      {
       $errMSG = "Sorry, your file is too large it should be less then 5MB";
      }
     }
     else
     {
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
     } 
    }
    else
    {
     // if no image selected the old image remain as it is.
     $userpic = $edit_row['userPic']; // old image from database
    } 
        
    
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
     $stmt = $conn ->prepare('UPDATE tbl_users 
                SET userName=:uname, 
                 userProfession=:ujob, 
                 userPic=:upic 
                 WHERE userID=:uid');
     $stmt->bindParam(':uname',$username);
     $stmt->bindParam(':ujob',$userjob);
     $stmt->bindParam(':upic',$userpic);
     $stmt->bindParam(':uid',$id);
      
     if($stmt->execute()){
      ?>
                  <script>
      alert('Successfully Updated ...');
      window.location.href='index.php';
      </script>
                  <?php
     }
     else{
      $errMSG = "Sorry Data Could Not Updated !";
     }
    }    
   }
  }
?>



<!-- ~~~~~~~~~~~~~~~~~=============DELETING FORM=================~~~~~~~~~~~~~~~~~-->
<?php
  if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){

   require_once 'config.inc.php';
  if(isset($_GET['delete_id']))
   {
    echo $_GET['name'];
    // select image from db to delete
    $stmt_select = $conn->prepare('SELECT userPic FROM tbl_users WHERE userID = :uid');
    $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("user_images/".$imgRow['userPic']);
    
    // it will delete an actual record from db
    $stmt_delete = $conn->prepare('DELETE FROM tbl_users WHERE userID =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();
    
    header("Location: index.php");
   }
  }
?>



