<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php if(!isset( $_SESSION['user_session']) ) { esc("<h2>Please Login</h2>"); } else { esc("Youare now logged in."); } ?>
    <p><a href='./'>Back to home page</a></p>
<hr>

<div class="form-group">
    <p><input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1"></p>
</div>
<br>
<div class="form-group">
    <p><input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3"></p>
</div>	

<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9">
        <p><a href='reset.php'>Forgot your Password?</a></p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-6">
        <p><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></p>
    </div>
</div>
</form>
</div>
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

<?php
// debug only - shows logged in sessions
display_sessions();
?>

</div>

<?php
//process login form if submitted
if(isset($_POST['submit'])){

require_once 'inc/functions.php';
include 'inc/dbh.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$active = (int)1;

$stmt = $dbh->prepare('SELECT * FROM tsw_members WHERE username = :username AND password = :password AND active = :active');
 
$stmt->execute(array(
':username' => $username,
':password' => $password,
':active'   => $active
));
  if ($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $firstname = $row['firstname'];
    $idm       = $row['idm'];
    $email     = $row['email'];

        $email_stripped = alpha_only($email);
        $date_session   = date('mdY-Hi');  
        $user_session   = $email_stripped;
           
            $_SESSION['user_session'] = "$user_session$date_session";  // used for uploads identifier 
            $_SESSION['firstname'] = $firstname;                       // for displaying name
            $_SESSION['user_id'] = $idm;                               // for user id fetching if needed

redirect('myaccount.php');  
} else {
esc('Wrong username or password.');
}


?>
<!-- alternate usage instead of redirect(or header) 
<h1>You are Logged In</h1>
<h2><?php print($_SESSION['firstname']); ?></h2> 
<a href='myaccount.php' class='btn btn-primary'>Logged In, Go to MyAccount</a>
<hr> -->
<?php
}
?> 