    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TSW Login Script </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                   <?php
$get_active = "class='active'"; ?>

                <ul class="nav navbar-nav">
<li><a href="login.php">Home</a></li>
<?php
if( $page == "registration" ) { ?>
    <li <?php echo $get_active; ?>><a href="registration.php">Register</a></li>
<?php } else { ?>
    <li><a href="registration.php">Register</a>
<?php } ?>

<?php
if( $page == "about" ) { ?>
    <li <?php echo $get_active; ?>><a href="">Why Join</a></li>
<?php } else { ?>
    <li><a href="">Why Join</a></li>
<?php } ?>

<?php
if( $page == "contact" ) { ?>
    <li <?php echo $get_active; ?>><a href="" title="contact">Contact Us</a></li>
<?php } else { ?>
    <li><a href="" title="contact">Contact Us</a></li>
<?php } ?>

<?php
if( $page == "myaccount" ) { ?>
    <li <?php echo $get_active; ?>><a href="myaccount.php" title="member log in | check card balance"> <span class="glyphicon glyphicon-user" id="login"></span>My Account</a></li>
<?php } else { ?>
    <li><a href="myaccount.php" title="member log in"> <span class="glyphicon glyphicon-user" id="login"></span>My Account</a></li>
<?php } ?>

<li><a href="inc/logout.php" title="member log out"> <span class="glyphicon glyphicon-user" id="logout"></span>Log Out</a></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>