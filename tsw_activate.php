<?php
/**
 * file name tsw_activate
 */

if (isset($_GET['username']) && isset($_GET['active']) )
{
include ('inc/dbh.php'); 
$username  = $_GET['username'];
$active = $_GET['active'];
$default = (int)0;

   // find row where username is not activated
   $stmt = $dbh->prepare("SELECT username, active, email FROM tsw_members 
                          WHERE username = :username AND active = :default
                         "); 
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':default', $default);
    $stmt->execute();
        if ($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $row['email'];
        }
    // query to validate username and email match
    $stmt = $dbh->prepare("UPDATE tsw_members 
                           SET active = :active  
                           WHERE username = :username AND email = :email
                          ");
    $stmt->bindValue(':active', $active);
    $stmt->bindValue(':username', $username);   
    $stmt->bindValue(':email', $email);                 
   
    if ($stmt->execute()) 
    {

?>

    <h1>Project Registration Complete<h1>
    <h3>Thank you </h3>
    <p>Email confirmed and account activated.</p>
    <p><?php date_default_timezone_set('America/New_York'); $dateformat = date_create()->format('Y-m-d'); echo $dateformat; ?></p>
    <hr>
    <p><a class="btn btn-lg btn-primary" href="myaccount.php" role="button">Let's Start</a></p>
    <hr>

<?php
    } else {
        echo "<p>This email has already been used for a Registration.</p>";
        echo "<p>Please try another email address.</p>";
       //close instance of $dbh
        }      //$dbh = null;

}
?>