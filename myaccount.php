<?php
require 'restrict.php';
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
				<p><a href='inc/logout.php'>Logout</a> &nbsp; | &nbsp;  <?php if( isset( $_SESSION['user_session']) ) { esc("You are safely logged in "); } ?></p>
				<hr>
             </div>
            </div>
        </div>
 
    <div class="container">
        <div class="row">

            <div class="col-md-7 toppad" >         
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <!--<A href="edit.html" >Edit Profile</A> | <A href="edit.html" >Logout</A> | --> <?php esc(date('m/d/Y')); ?>
                        <h3 class="panel-title"><?php echo $_SESSION['firstname']; ?></h3>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> 
                            <h5>Badge</h5><img src="<?php //esc($points); ?>" height="32" alt="badge or avatar"/>
                        </div>            
                        <div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information"><tbody>
                            <tr><td>Email: </td><td><?php //esc($email); ?></td></tr>
                            <tr><td>Username: </td><td><?php //esc($username); ?></td></tr>
                            <tr><td>Current Task: </td><td><?php //esc($taskname); ?></td></tr>
                            </tbody></table>
                        </div>
                    </div>
                    </div>
                        <div class="panel-footer">
                            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                            <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            </span>
                        </div>
                </div>

<?php include 'tsw_myaccount.php'; ?>

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