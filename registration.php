<?php
include 'header.php';
$page = 'registration';
$title= 'TSW Login';
?>
<title><?php print($title); ?></title>
</head>
<body>

<?php include 'nav.php'; ?>
<div class="clearfix"><hr></div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                   <?php include 'tsw_registration.php'; ?>
                </div>
                <div class="col-md-6">
                    <h2>Registration information</h2>
<p>This is a great chance to send Larry a donation through PayPal. I swear I spent at least two days on this login and registration form, mostly to make it compatible with about any project and to make it secure as well as up to date.</p><p>You should be able to insert the individual <xmp>tsw_filename.php</xmp> into your PHP pages, without the default templates that come with this script. This is one of the conveniences I considered when designing this project. So I hope you like it and can buy me a beer!</p> 
<div class="text-center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="3AL5X897GNPGQ">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<h4>This link will send you to Paypal then back to my computer repair website: <a href="http://sunlandcompters.com" title="sunland computers">Sunland Computers</a></h4>
</div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="panel-title text-center">More Info goes here</h1>
                </div>
 
                <div class="col-md-6">
                    <h1 class="section-heading">Website Details</h1>
                
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
<div class="clearfix"><hr></div>
<?php include 'footer.php'; ?>