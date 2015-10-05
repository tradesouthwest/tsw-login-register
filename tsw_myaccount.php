<?php
/**
 * TSW Login
 */
?>

<p><a href='./'>Back to home page</a> | <a href="myaccount.php?change=change">Change Password</a> | <a href="myaccount.php?reset=reset">Forgot Password</a></p>
<hr>
<div id="reset">
<?php if(isset( $_GET['reset']) ){ ?>
    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Forgot Password</h2>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Enter Email of Account" tabindex="1">
                    </div>
                </div>
            </div>
                <hr>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input type="submit" name="submit-new" value="Reset Password" class="btn btn-primary btn-block btn-lg" tabindex="3">
                </div>
            </div>
    </form>
<?php } ?>
<?php include 'tsw_reset.php'; ?>
</div>
<div id="change">
<?php if(isset( $_GET['change']) ){ ?>
    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Change Password</h2>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="old_password" class="form-control" placeholder="Enter current password" tabindex="1" autofocus>
                    </div>
                </div>
            </div>
                <hr>
           <div class="row">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
            <p><label for="password">New Password:</label><br>
            <input required name="new_password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> <span class="req"> *</span></p>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
            <p><label for="password">Confirm Password:</label><br>
            <input required name="confirm_password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to confirm"  id="pass2" onkeyup="checkPass(); return false;" /> <span class="req"> *</span>
<span id="confirmMessage" class="confirmMessage"></span></p>
</div>
</div>
                <hr>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input type="submit" name="submit-change" value="Reset Password" class="btn btn-primary btn-block btn-lg" tabindex="3">
                </div>
            </div>
    </form>
<?php } ?>
<?php include 'tsw_change.php'; ?>
</div>


 