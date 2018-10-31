<?php
session_start();
include_once 'buslogic.php';
if(isset($_POST["btnsub"]))
{
    $obj=new clsreg();
    $obj->regeml=$_POST["txteml"];
    $obj->regpwd=$_POST["txtpwd"];
    $obj->regdat=date('y-m-d');
    try
    {
        $obj->save_rec();
        $msg="Registration Successful";
    } catch (Exception $ex) {
        $msg="Email ID already registered";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scrappad</title>
<!-- || Bootstrap CSS || -->
<link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<!-- || Fonts Style CSS || -->
<link href="assets/css/sitefont/montserrat/montserrat.css" type="text/css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<!-- || Main Style CSS || -->
<link href="assets/css/style.css" type="text/css" rel="stylesheet">

<!-- || Main Style CSS || -->
<link href="assets/css/hover.css" type="text/css" rel="stylesheet">

<!-- || Responsive Style CSS || -->
<link href="assets/css/responsive.css" type="text/css" rel="stylesheet">
</head>

<body>
<!-- || Header Main || -->
<header class="blockElement mainHeader">
		<div class="container">
				<nav class="navbar navbar-main-menu"> 
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
								<a class="navbar-brand" href="index.html">
								<img src="assets/images/main-logo.png" alt="">
								</a> </div>
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
										<li><a href="index.php">Home</a></li>
                                                                                <?php
                                                                                if(isset($_SESSION["ucod"]))
                                                                                {
                                                                                ?>
										<li><a href="frmpst.php">Post Query</a></li>
                                                                                <?php
                                                                                }
                                                                                ?>
										<li><a href="frmreg.php">Register</a></li>
									<?php
                                                                        if(isset($_SESSION["ucod"]))
                                                                            echo "<li><a href=index.php?sts=s >Logout</a><li>";
                                                                        else
                                                                            echo "<li><a href=login.php >Login</a></li>";
                                                                        ?>
									
								</ul>
						</div>
						
						<!-- /.navbar-collapse --> 
						
				</nav>
		</div>
</header>
<!-- || Header Main // End || --> 







<!-- || Team for projects || -->
<section class="blockElement testimonial_section">
		<div class="container">
				
				<div class="login-area">
					<h2><span>Sign Up</span></h2>
					<h4>Fill your details here</h4>
                                        <form method="post" action="frmreg.php">
					<input type="text" name="txteml" placeholder="Email" required="">
					<input type="password" name="txtpwd" placeholder="Password"required="">
					<input type="password" name="txtconpwd" placeholder="Confirm Password" required="">
					
                                        <input type="submit" value="Register" name="btnsub">
					</form>
                                        <p>Do you have account ? <a href="login.php">Login here</a></p>
                                        <p>
                                            <?php
                                            if(isset($msg))
                                                echo $msg;
                                            ?>
                                        </p>
				</div>
		</div>
</section>
<!-- || Team for projects // End || --> 
<!-- || Team for projects || -->


<!-- || Footer || -->
<footer class="main-footer blockElement">
		<div class="container">
				<div class="row">
				<p class="copyright">© 2017 All Rights Reserved. Privacy Policy</p>
					<div class="footer-second">
						<ul class="social-icons">
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						
				</div>
				</div>
				
		</div>
</footer>

<!-- || Jquery || --> 
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
<!-- || Bootstrap Jquery || --> 
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script> 
<!-- || Respond Jquery || --> 
<script src="assets/js/respond.min.js" type="text/javascript"></script> 
<script src="assets/js/common.js" type="text/javascript"></script>
</body>
</html>
