<?php  session_start(); 
  require_once 'config.inc.php';
  include_once 'header.php';

  if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){
    if(isset($_GET['delete_id']))
     {

      // select image from db to delete
      $stmt_select = $conn->prepare('SELECT userPic FROM tbl_users WHERE userID = :uid');
      $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
      $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
      unlink("user_images/".$imgRow['userPic']);
      
      // it will delete an actual record from db
      $stmt_delete = $conn->prepare('DELETE FROM tbl_users WHERE userID =:uid');
      $stmt_delete->bindParam(':uid',$_GET['delete_id']);
      $stmt_delete->execute();
      echo  '<h2 class ="message text-center"> The file has been deleted.</h2>' ;
     }
  }
?>