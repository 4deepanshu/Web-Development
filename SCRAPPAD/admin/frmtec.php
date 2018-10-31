<?php
include_once '../buslogic.php';
session_start();
if(isset($_POST["btnupd"]))
{
    $obj=new clstec();
    $obj->teccod=$_SESSION["tcod"];
    $obj->tecnam=$_POST["txttecnam"];
    $obj->update_rec();
    unset($_SESSION["tcod"]);
}
if(isset($_REQUEST["tcod"]))
{
    if(isset($_REQUEST["mod"]) && $_REQUEST["mod"]=='D')
    {
        $obj=new clstec();
        $obj->teccod=$_REQUEST["tcod"];
        $obj->delete_rec();
    }
    if(isset($_REQUEST["mod"])&& $_REQUEST["mod"]=='E')
    {
        $obj=new clstec();
        $obj->teccod=$_REQUEST["tcod"];
        $obj->find_rec();
        $tnam=$obj->tecnam;
        $_SESSION["tcod"]=$_REQUEST["tcod"];
    }
}
if(isset($_POST["btnsub"]))
{
    $obj=new clstec();
    $obj->tecnam=$_POST["txttecnam"];
    $obj->save_rec();
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
				<div class="section-heading blockElement">
						<div class="col-md-10 col-md-offset-1">
								<h2><span>Technologies</span></h2>
								<div class="py-5 contact-main">
                            <form method="Post" action="frmtec.php" class="form-tec">
                            <div class="row">
                                <div class="col-md-4 padd">
                                      
                                    <div class="form-group">
                                      
                              <input class="form-control" id="exampleInputName" 
                         aria-describedby="NameHelp" placeholder="Name" 
                         type="text" name="txttecnam" required=""
                         value="<?php if(isset($tnam)) echo $tnam;  ?>"
                         >
                                    </div>
                                </div>
                            
                                <div class="col-md-2 text-center padd">
                                    <?php
                               if(isset($_SESSION["tcod"]))
                         echo "<input type=submit value=Update name=btnupd />";  
                               else
                         echo "<input type=submit value=Submit name=btnsub />";          
                                    ?>
                                   
                                </div>
                          <?php
                            $obj=new clstec();
                            $arr=$obj->display_rec();
                        if(count($arr)>0)
                        {
                    echo "<table width=100% border=2 >";
                   echo "<tr><th colspan=2 >Technology</th</tr>";
                    for($i=0;$i<count($arr);$i++)
                    {
                   echo "<tr><td>".$arr[$i][1]."</td>";             
                   echo "<td>";
            echo "<a href=frmtec.php?tcod=".$arr[$i][0]."&mod=E >Edit</a>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href=frmtec.php?tcod=".$arr[$i][0]."&mod=D >Delete</a>";
                   echo "</td>";
                   echo "</tr>";
                    }
                    echo "</table>";
                        } 
                          ?>
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

