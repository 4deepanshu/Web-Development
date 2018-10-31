<?php
session_start();
include_once 'buslogic.php';
if(!isset($_SESSION["ucod"]))
{
    header("location:login.php");
}
if(isset($_POST["btnsub"]))
{
    $obj=new clspst();
    $obj->psttit=$_POST["txttit"];
    $obj->pstteccod=$_POST["drptec"];
    $obj->pstregcod=$_SESSION["ucod"];
    $obj->pstrat=0;
    $obj->pstdsc=$_POST["txtdsc"];
    $obj->pstdat=date('y-m-d');
    $obj->pstatt=$_FILES["filupl"]["name"];
    $obj->save_rec();
    if($_FILES["filupl"]["name"]!="")
    {
        move_uploaded_file($_FILES["filupl"]["tmp_name"],
          "uploads/".$_FILES["filupl"]["name"]);
    }
    $msg="Query posted successfully.It will replied soon.";
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
										
									<?php
                                                                        if(isset($_SESSION["ucod"]))
                                                                            echo "<li><a href=index.php?sts=s >Logout</a><li>";
                                                                        else
                                                                        {
                                                                             echo '<li><a href="frmreg.php">Register</a></li>';
                                                                            echo "<li><a href=login.php >Login</a></li>";
                                                                        }
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
				
				<div class="blockElement">
						<div class="col-md-10 col-md-offset-1 xv">
								<h2><span>Post Query</span></h2>
								<div class="py-5 contact-main">
                                                  <form method="post" action="frmpst.php" enctype="multipart/form-data">
                                                <table width="100%" class="jk">
                                                    <div class="col-md-3">
                                                        Select Technology</div>
                                                       <div class="col-md-9 form-group gg">
                                                            <select name="drptec">
                                                   <?php
                                                     $obj=new clstec();   
                                                   $arr=$obj->display_rec();
                                                   for($i=0;$i<count($arr);$i++)
                                                   {
                                             echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                                                   }
                                                   ?>
                                                            </select>
                                                       </div>
                                                    
                                                    <div class="col-md-3">Query Title</td></div>
                                                        <div class="col-md-9 form-group">
                                                            <input type="text" name="txttit" required=""/>
                                                        </div>
                                                    
                                                  
                                                    <div class="col-md-3">Description</div>
                                                      <div class="col-md-9 form-group">  
                                                            <textarea name="txtdsc" rows="7" cols="70" required=""></textarea>
                                                      </div>
                                                       
                                                   
                                                   
                                                    <div class="col-md-3">Browse Attachment</div>
                                                    <div class="col-md-9 form-group">    
                                              <input type="file" name="filupl" required=""/>
                                                    </div> 
                                                  
                                                    <tr>
                                                        <td></td>
                                                        <td class="fh">
                                             <input type="submit" name='btnsub' value="Submit"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <?php
                                                            if(isset($msg))
                                                                echo $msg;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                            
                                             </form>
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


