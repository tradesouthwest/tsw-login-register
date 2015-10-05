<?php 
//if form has been submitted process it
if(isset($_POST['submit-change']))
{
include_once 'inc/functions.php';
require 'inc/dbh.php';
$user_id = $_SESSION['user_id'];
$old_password = md5($_POST['old_password']);
$new_password = md5($_POST['new_password']);

$stmt = $dbh->prepare("SELECT * FROM tsw_members WHERE idm = :idm AND password = :password");
    $stmt->bindValue(':idm', $user_id);
    $stmt->bindValue(':password', $old_password);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
        $email = $row['email'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        } else { echo "There was a problem entering your original password."; $errors = $stmt->errorInfo();
        echo($errors[2]); }    
       
/**
 * @user_id 
 * and update if-valid
 */
 $user_id = $_SESSION['user_id'];
            $stmt = $dbh->prepare("UPDATE tsw_members SET password = :password WHERE idm = :idm");
            $stmt->execute(array(':idm' => $user_id, ':password' => $new_password ));
            if(!$stmt) { 
                esc("There was a problem updating new password."); $errors = $stmt->errorInfo();
                esc(($errors[2]));
            } else {

            include_once 'inc/settings.php';    

            $server     = $server_name; 
	    $uri        = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $host       = $_SERVER['HTTP_HOST'];
	    $sendemails = array('$server_email', $email);
	        foreach ($sendemails as $sendemail) {

	$message = 
"You requested a new password for your account at $server_name. This is a notification to such and if you did not request a password change please contact your website administrator. \n\n
First Name: $firstname \n
User Name:  $username \n
User Email: $email \n
_____________________________________________
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	        mail( $sendemail, "Password Reset", $message,
               "From: \"Auto-Response\" <noreply@$host>\r\n" .
               "X-Mailer: PHP/" . phpversion());
	        unset($_SESSION['ckey']);
                }
	        print("<h2>Your password change is complete!</h2><hr>
             ");	
	 
        echo "<hr>Your request is processed</h2>";
        echo "<BR>";
        echo "Data entered - "; 
        echo date("m/d/y");
        echo "<BR>";
        echo "<p>If this is YOUR CORRECT email: ";
        echo "<span class='valid'>";
        echo $email;
        echo "</span>You will receive a confirmation.</p>";
        
            }
}

?>

<div class="clearfix"><hr></div>