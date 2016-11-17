 <?php
 session_start(); 

 include_once 'header.php';
 require_once 'config.inc.php';

$username = "Erica";
$password = "Ethan";

if (($_POST['txt_uname_email'] == $username)&& ($_POST['txt_password'] == $password)) {
  //login
 

      $_SESSION['admin_is_logged'] = true;
      echo '<script type="text/javascript"> window.open("index.php","_self");</script>';            //  On Successfull Login redirects to home.php

} else{
  echo 'Sorry! Only admin can log in...';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login : cleartuts</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/tilteffect.css" />
<link rel="stylesheet" type="text/css" href="css/demomain.css" />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2 id="sign">Sign in.</h2><hr />
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <div class="form-group">
             <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" name="btn-login" class="btn btn-block btn-primary">
                 <i class="glyphicon glyphicon-log-in"></i>&nbsp;SIGN IN
            </button>
            <a href="logout.php" id="logout">Logout</a>
            </div>
            <br />
        </form>
       </div>
</div>

</body>
</html>








