<?php
session_start();
require_once 'inc/functions.php';
include 'header.php';
$page = 'index';
$title= 'TSW-Login';
?>
<title><?php print($title); ?></title>
</head>

<body>

<?php include 'nav.php'; ?>
<div class="clearfix"><hr></div> 

    <div class="container">
        <div class="row">

            <header class="col-lg-12">
                <h1>TSW Basic Register and Login Script<h1>
                   <h3>Moving forward: <?php if( !isset( $_SESSION['user_session']) ) { print('Please Log In'); } else { print($_SESSION['firstname']); } ?></h3>
            </header>

        </div>
    </div>
        <hr>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Simple Log In Script</div>
                    <div class="panel-body">Register, Activate, Login, Logout</div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Features</div>
                    <div class="panel-body">
                           <div class="bordered">
                               <ul><li>Easily adaptible to about any PHP script</li>

                               <li>Creates three SESSIONs to use for retrieving data</li>
                               <li>PDO prepared stmts </li>
                               <li>Using MySQL - sql table included</li>
                               <li>Checks for duplicate email on registry</li>
                               <li>Inserts MD5 password</li>
                               <li></li>
                               <li></li>
                               <li></li>
                               </ul>
                           </div>
                    </div>
                        <div class="panel-footer clearfix">
                            <div class="pull-right">
                                <a class="btn btn-danger" href="#mylogin" title="pass">Login</a> &nbsp; 
                                <a class="btn btn-primary" href="inc/logout.php" title="pass">Log Out</a>
                            </div>
                        </div>
                </div>
        <hr>
               
<figure class="col-md-4"><img src="https://placeimg.com/420/380/any/sepia" class="img-responsive" alt="img"/></figure>
<figure class="col-md-4"><img src="https://placeimg.com/420/380/nature/sepia" class="img-responsive" alt="img"/></figure>
<figure class="col-md-4"><img src="https://placeimg.com/420/380/people/sepia" class="img-responsive" alt="img"/></figure>
               
            
                <div class="col-md-12 bordered pad-height pad-width"> 
                    <div class="panel panel-default">
                        <div class="panel-heading" id="mylogin"><h4>Submit Valid Login Info Here:</h4></div>
                            <div class="panel-body"> 
                
                                <?php include 'tsw_mylogin.php'; ?>
                             
                            </div>
                        </div>
                </div>
 
   
        </div><!-- ends row -->
    </div><!-- ends container -->

<div class="clearfix"><hr></div>
<?php include 'footer.php'; ?>
