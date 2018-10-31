<?php
include_once '../buslogic.php';
session_start();
if(isset($_POST["btnsub"]))
{
    $obj=new clsrep();
    $obj->reppstcod=$_SESSION["pcod"];
    $obj->repregcod=1;
    $obj->repdsc=$_POST["txtdsc"];
    $obj->repdat=date('y-m-d');
    $obj->repatt=$_FILES["filupl"]["name"];
    $obj->save_rec();
    if($obj->repatt!="")
        move_uploaded_file ($_FILES["filupl"]["tmp_name"],
              "../repupl/".$_FILES["filupl"]["name"]);
    $obj1=new clspst();
    $obj1->pstcod=$_SESSION["pcod"];
    $obj1->find_rec();
    $obj2=new clsreg();
    $obj2->regcod=$obj1->pstregcod;
    $obj2->find_rec();
    mail($obj2->regeml,"Reply for your query",$_POST["txtdsc"]);
    header("location:frmsrc.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scrappad</title>
<!-- || Bootstrap CSS || -->
<link href="../assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<!-- || Fonts Style CSS || -->
<link href="../assets/css/sitefont/montserrat/montserrat.css" type="text/css" rel="stylesheet">
<link href="../assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<!-- || Main Style CSS || -->
<link href="../assets/css/style.css" type="text/css" rel="stylesheet">

<!-- || Main Style CSS || -->
<link href="../assets/css/hover.css" type="text/css" rel="stylesheet">

<!-- || Responsive Style CSS || -->
<link href="../assets/css/responsive.css" type="text/css" rel="stylesheet">
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
								<img src="../assets/images/main-logo.png" alt="">
								</a> </div>
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
										<li><a href="../index.php">Home</a></li>
										<li><a href="frmtec.php">Technology</a></li>
                                                                                <li><a href="frmsrc.php">Recent Posts</a></li>
									        <li><a href="../index.php?sts=S">Logout</a></li>
								</ul>
						</div>
						
						<!-- /.navbar-collapse --> 
						
				</nav>
		</div>
</header>
<!-- || Header Main // End || --> 

<!-- Team --> 
<!-- || Team for projects || -->
<section class="blockElement testimonial_section">
		<div class="container">
				<div class="blockElement">
						<div class="col-md-10 col-md-offset-1 df">
								<h2><span>Post Reply</span></h2>
								<div class="py-5 contact-main">
                                                                    <form method="Post" action="frmrep.php" enctype="multipart/form-data">
                                <?php
                                if(isset($_REQUEST["pcod"]))
                                    $_SESSION["pcod"]=$_REQUEST["pcod"];
                                $obj=new clspst();
                                $obj->pstcod=$_SESSION["pcod"];
                                $obj->find_rec();
                                echo "<h5>".$obj->psttit."</h5>";
                                echo "<p>".$obj->pstdsc."</p>";
                                ?>
                           
                            
                              
                                    <div class="form-group text-sec">
                                        <label>Reply Description</label>
                                        <textarea name="txtdsc" rows="7" required=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Browse Attachment</label>
                        <input type="file" name="filupl"/>
                                    </div>
                                    <div class="form-group form-er">
                        <input type="submit" name="btnsub" value="Submit"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="btncan" value="Cancel"/>
                                    </div>
                             
                            
                         
                           
                            <!--/Fifth row-->
                        </form>
                <!--/Second row-->
       

            </div>
						</div>
				</div>
		</div>
</section>
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
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
<!-- || Bootstrap Jquery || --> 
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script> 
<!-- || Respond Jquery || --> 
<script src="../assets/js/respond.min.js" type="text/javascript"></script> 
<script src="../assets/js/common.js" type="text/javascript"></script>
</body>
</html>

