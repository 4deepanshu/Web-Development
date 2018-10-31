<?php
include_once 'buslogic.php';
session_start();
if(isset($_POST["btnsub"]))
{
    if($_POST["txteml"]=="admin@scrappad.com" && $_POST["txtpwd"]=="admin123#")
        header("location:admin/frmtec.php");
    $obj=new clsreg();
    $a=$obj->login($_POST["txteml"], $_POST["txtpwd"]);
    if($a==-2)
        $msg="Email ID not registered.";
    else if($a==-1)
        $msg="Password Incorrect.";
    else
    {
        $_SESSION["ucod"]=$a;
        header("location:index.php");
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
					<h2><span>Login</span></h2>
                                        <form method="post" action="login.php">
					<h4>Fill your details here</h4>
					<input type="text" name="txteml" placeholder="Email" required="">
					<input type="password" name="txtpwd" placeholder="Password" required="">
					<input type="submit" value="Submit" name="btnsub">
					<p>Don't have account ? <a href="frmreg.php">Sign Up</a></p>
                                        <p>
                                            <?php
                                            if(isset($msg))
                                                echo $msg;
                                            ?>
                                        </p>
                                        </form>
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

