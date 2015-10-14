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
                <div class="col-lg-12">

                   <?php include 'tsw_register.php'; ?>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="panel-title text-center">Tradesouthwest.com</h1>
                </div>
 
                <div class="col-lg-6">
                    <h1 class="section-heading">Website Details</h1>
                
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->

<div class="clearfix"><hr></div>
<?php include 'footer.php'; ?>
