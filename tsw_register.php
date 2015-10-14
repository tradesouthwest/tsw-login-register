<?php
/**
 * TSW Login
 * Copyright 2015 - Tradesouthwest
 * file name: tsw_register
 */

if( isset( $_POST['submit_reg'] ) ) 
{
include 'inc/functions.php';
    $username         = escmim($_POST['username']);       // escmim Remove all illegal characters w/out db conn
    $password         = md5($_POST['password']);
    $phonenumber      = escmim($_POST['phonenumber']);
    $firstname        = escmim($_POST['firstname']);
    $lastname         = escmim($_POST['lastname']);
    $email            = escmim($_POST['email']);          
    $dateregistered   = escmim($_POST['dateregistered']);
    $active           = (int)0;

    include 'inc/dbh.php'; 
    // check database for duplicate email
    $query = $dbh->prepare("SELECT email FROM tsw_members
                            WHERE email = :email 
                               "); 
    $query->bindValue(':email', $email);
    $query->execute();
    if($query->rowCount() > 0)
    {
        ?><p>This email has already been registered.</p>
          <p>Please choose a new email. <a class="btn btn-default" href='#' onclick='history.go(-1)'>Go Back</a></p><?php
    } else {

        // get the thank you message
        //print('<p>Thank you for registering.</p>');

//include 'inc/dbh.php'; 

// new query to insert data

$sql = ("INSERT INTO tsw_members ( username, password, phonenumber, firstname, lastname, email, dateregistered, active  ) 
         VALUES ( :username, :password, :phonenumber, :firstname, :lastname, :email, :dateregistered, :active )
        "); 

$stmt = $dbh->prepare($sql);
$stmt->bindValue(':username',       $username);
$stmt->bindValue(':password',       $password);
$stmt->bindValue(':phonenumber',    $phonenumber);
$stmt->bindValue(':firstname',      $firstname); 
$stmt->bindValue(':lastname',       $lastname);
$stmt->bindValue(':email',          $email);
$stmt->bindValue(':dateregistered', $dateregistered);
$stmt->bindValue(':active',         $active);
//$stmt->bindValue(':level',        $level);

    //Execute the statement and insert the new account.
    $insert = $stmt->execute();
    
    //If the signup process is successful.
    if( $insert !==false ) {

        $server     = $server_name; 
	$uri        = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $host       = $_SERVER['HTTP_HOST'];
	$sendemails = array('$server_email', $email);
	foreach ($sendemails as $sendemail) {

	$message = 
"You are almost finished. You MUST complete your activation and registion  with $server. Please click on the activation link below to complete the process:\n\n
First Name: $firstname \n
Last Name: $lastname \n
User Email: $email \n
____________________________________________
*** ACTIVATION LINK ***** \n
Activation Link: http://$host$uri/activate.php?username=$_POST[username]&active=1 \n\n
_____________________________________________
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	mail( $sendemail, " Registration", $message,
    "From: \"Auto-Response\" <notifications@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());
	unset($_SESSION['ckey']);
        }
	echo("<h2>You are almost complete!</h2><p>Next step is to validate your email</p><p>An activation link has been sent to your email address with an activation link...<br>
              Be sure to check your spam folders. Validation process may take a few minutes.</p> <br><hr>
             ");	
	 
        echo "<hr>Your registration is processed</h2>";
        echo "<BR>";
        echo "Data entered - "; 
        echo date("m/d/y");
        echo "<BR>";
        echo "<p>If this is YOUR CORRECT email: ";
        echo "<span class='valid'>";
        echo $email;
        echo "</span> You will receive a confirmation ONLY if your information is valid.</p>";
        

    } else { echo "There was a problem entering your information."; $errors = $stmt->errorInfo();
    echo($errors[2]); }

    } // ends check dup emails

} // ends if reg_submit
?>
