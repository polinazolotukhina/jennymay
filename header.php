
 <!--==============================HEADER=============================================-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/index.php">Jmay</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contact.php">Contact me</a></li>
            <?php 
              if (isset($_SESSION['admin_is_logged']) && $_SESSION['admin_is_logged'] == true){
                echo '<li><a href="/add_photo.php">add photo</a></li>';
              }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <a href="https://www.facebook.com/jmay.mua?fref=ts" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="https://instme.com/profile/i_am_dyenimey" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </ul>
          </li>
        </ul>
       <link rel="stylesheet" type="text/css" href="css/set1.css" />
       <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/tilteffect.css" />
        <link rel="stylesheet" type="text/css" href="css/demomain.css" />
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    <!--==============================END   HEADER=============================================-->