<?php 
//if form has been submitted process it
if( isset($_GET['username']) && isset($_GET['resetToken']) ) {
require_once 'inc/functions.php';
$token = alpha_only($_GET['resetToken']);
require_once 'inc/dbh.php';

    $stmt = $dbh->prepare('SELECT resetToken FROM tsw_members WHERE resetToken = :token');
    $stmt->execute(array(':token' => $token));

        if ($stmt->rowCount() > 0){         
?>

<form role="form" method="post" action="" autocomplete="off">
<h2>Change Password</h2>

<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
            <p><label for="password">Password:</label><br>
            <input required name="new_password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> <span class="req"> *</span></p>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
            <p><label for="password">Password:</label><br>
            <input required name="confirm_password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to confirm"  id="pass2" onkeyup="checkPass(); return false;" /> <span class="req"> *</span>
<span id="confirmMessage" class="confirmMessage"></span></p>
</div>
</div>

</div>
<hr>
<div class="row">
<div class="col-xs-6 col-md-6"><input type="submit" name="submit-pass" value="Change Password" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
</div>
</form>
<hr>

<?php 
        } else {
	esc('<h2>Invalid token provided, please use the link provided in the reset email.</h2>'); 
        }

?>
<?php
    if(isset($_POST['submit-pass'])){
    require_once 'inc/functions.php';
    $new_password = md5($_POST['new_password']);
    require_once 'inc/dbh.php';
    $stmt = $dbh->prepare("UPDATE tsw_members SET password = :new_password  WHERE resetToken = :token");
    $stmt->execute(array(
    ':new_password' => $new_password,
    ':token' => $token
    ));
    //redirect to index page
    redirect('login.php');
    exit;
    }
}
?>

<div class="clearfix"><hr></div>