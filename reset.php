<?php
require 'inc/settings.php';
require_once 'inc/functions.php';
require 'header.php';

$page = 'myaccount';
$title= 'TSW Login';

?>
<title><?php print($title); ?></title>
</head>

<body>

<?php include 'nav.php'; ?>
<div class="clearfix"><hr></div>

        <div class="container">
            <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                  <h2>Member only page - Welcome <?php echo $_SESSION['firstname']; ?></h2>
				<p><a href='logout.php'>Logout</a>      <?php if( isset( $_SESSION['user_session']) ) { esc("You are safely logged in "); } ?></p>
				<hr>
             </div>
            </div>
        </div>
 
    <div class="container">
        <div class="row">
            <div class="col-md-7 toppad" >   

                <?php include 'tsw_resetPassword.php'; ?>

            </div>

            <div class="col-md-5  toppad">
<figure class="col-lg-4 bordered"><img src="https://placeimg.com/420/380/any/sepia" class="img-responsive" alt="img"/></figure>
<figure class="col-lg-4 bordered"><img src="https://placeimg.com/420/380/nature/sepia" class="img-responsive" alt="img"/></figure>
<figure class="col-lg-4 bordered"><img src="https://placeimg.com/420/380/people/sepia" class="img-responsive" alt="img"/></figure>
            </div>
 
        </div><!-- /.row -->
    </div><!-- /.container -->

<div class="clearfix"><hr></div>
<?php include 'footer.php'; ?>