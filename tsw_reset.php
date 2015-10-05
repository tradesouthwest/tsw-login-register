<?php 
//if form has been submitted process it
if(isset($_POST['submit-new']))
{
require_once 'inc/dbh.php';
$email = $_POST['email'];

$stmt = $dbh->prepare("SELECT * FROM tsw_members WHERE email = :email");
$stmt->execute(array( ':email' => $email ));

    if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $row['firstname'];
        $username  = $row['username'];   
        } else { echo "There was a problem entering your account information."; $errors = $stmt->errorInfo();
        echo($errors[2]); }    
/**
 * @revalidate $username + $email 
 * and update new token if-match
 */
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $stmt = $dbh->prepare("UPDATE tsw_members SET resetToken = :token WHERE email = :email");
            $stmt->execute(array(':token' => $token, ':email' => $email ));
            if(!$stmt) { 
                echo "There was a problem updating security token."; $errors = $stmt->errorInfo();
                echo($errors[2]);
            } else {

            include_once 'inc/settings.php';    

            $server     = $server_name; 
	    $uri        = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $host       = $_SERVER['HTTP_HOST'];
	    $sendemails = array('$server_email', $email);
	        foreach ($sendemails as $sendemail) {

	$message = 
"You requested a new password reset for your account at $server_name. Please click on the reset link below to complete the process:\n\n
First Name: $firstname \n
User Name:  $username \n
User Email: $email \n
____________________________________________
*** RESET LINK ***** \n
Reset Password Link: http://$host$uri/reset.php?username=$username&resetToken=$token \n\n
_____________________________________________
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	        mail( $sendemail, "Password Reset", $message,
               "From: \"Auto-Response\" <noreply@$host>\r\n" .
               "X-Mailer: PHP/" . phpversion());
	        unset($_SESSION['ckey']);
                }
	        echo("<h2>You are almost complete!</h2><p>Next step is check your email</p><p>A reset link has been sent to your email address with a password reset link...<br>Be sure to check your spam folders. Validation process may take a few minutes.</p> <br><hr>
             ");	
	 
        echo "<hr>Your request is processed</h2>";
        echo "<BR>";
        echo "Data entered - "; 
        echo date("m/d/y");
        echo "<BR>";
        echo "<p>If this is YOUR CORRECT email: ";
        echo "<span class='valid'>";
        echo $email;
        echo "</span> You will receive a confirmation ONLY if your information is valid.</p>";
        
            }
}

?>

<div class="clearfix"><hr></div>