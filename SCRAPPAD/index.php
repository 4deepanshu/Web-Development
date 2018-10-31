<?php
session_start();
include_once 'buslogic.php';
if(isset($_REQUEST["sts"]))
{
    unset($_SESSION["ucod"]);
}
if(isset($_REQUEST["tcod"]))
{
    $_SESSION["tcod"]=$_REQUEST["tcod"];
}
if(isset($_REQUEST["patt"]))
{
     $fi="uploads/".$_REQUEST["patt"];
    if (file_exists($fi))
        {
header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($fi));
    header('Content-Length: ' . filesize($fi));
    ob_clean();
    flush();
    readfile($fi);
    exit;    
        }
}
if(isset($_REQUEST["pattt"]))
{
     $fi="repupl/".$_REQUEST["pattt"];
    if (file_exists($fi))
        {
header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($fi));
    header('Content-Length: ' . filesize($fi));
    ob_clean();
    flush();
    readfile($fi);
    exit;    
        }
}














?>
<!doctype html>
<html lang="en">
<head>
    <script lang="javascript">
function abc(a)
{
    window.location="index.php?tcod="+a;
}

</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scrappad</title>
<!-- || Bootstrap CSS || -->
<link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<!-- || Fonts Style CSS || -->
<link href="assets/css/sitefont/montserrat/montserrat.css" type="text/css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<!-- || Main Style CSS || -->
<link href="assets/css/style.css?4" type="text/css" rel="stylesheet">

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
                                                                        {   echo '<li><a href="frmreg.php">Register</a></li>';
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
<section class="blockElement main-fullscreen home">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="assets/images/slide-01.jpg" alt="Los Angeles" style="width:100%;height: 340px;">
      </div>

      <div class="item">
        <img src="assets/images/slide-01.jpg" alt="Chicago" style="width:100%;height: 340px;">
      </div>
    
      <div class="item">
        <img src="assets/images/slide-01.jpg" alt="New York" style="width:100%;height: 340px;">
        
      </div
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	
</section>
<section class="blockElement testimonial_section">
		<div class="container">
				<div class="section-heading blockElement">
						<div class="col-md-10 col-md-offset-1 post">
                                                    <h2><span>Recent Posts</span></h2><h4 class="right-free"><a href="frmpst.php">Post Query</a></h2>
								<div class="py-5 contact-main">
                            <form method="Post" action="index.php">
                            <div class="col-md-12 col-main">
                                
                                </div>
                                <div class="row">
                                
                                    <div class="col-md-12 col-main">
                                        <span>Select Technology</span>
                                        
                       <select name="drptec" onchange="abc(this.value);">
                                                <?php
                                
                                                
                                            $obj=new clstec();
                                            $arr=$obj->display_rec();
                                            for($i=0;$i<count($arr);$i++)
                                            {
                                if(isset($_SESSION["tcod"]) && $_SESSION["tcod"]==$arr[$i][0])
                                echo "<option value=".$arr[$i][0]." selected />".$arr[$i][1];  
                                 else
                                echo "<option value=".$arr[$i][0]." />".$arr[$i][1];
                                            }
                                                ?>
                                            </select>
                                    </div>     
                                   
                                
                                <div class=" top-dec"> 
                                <?php
                                if(isset($_SESSION["tcod"]))
                                    $a=$_SESSION["tcod"];
                                else
                                    $a=1;
                                  $obj=new clspst();
                     $arr=$obj->display_rec($a);
       
                      for($i=0;$i<count($arr);$i++)
                      {
                          echo "<div class=topic-sec >"; 
                         echo "<i class=fa fa-user-circle ></i>";	
                         echo "<h5>".$arr[$i][1]."</h5>";
                         //echo "<b>Posted On ".$arr[$i][4]."</b>";
                         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
               
                         echo "<b>Posted By ".$arr[$i][5]."</b><br>";
			echo "<p>".$arr[$i][2]."</p>";
                        if($arr[$i][3]!="")
                echo "<a class='btndft' href=index.php?patt=".$arr[$i][3]." >Download User Attachment</a>";
                     echo "<div class='rating'>";
                            for($j=1;$j<=$arr[$i][6];$j++)
                            {
                                echo "<img src=assets/images/star.png height=10px width=10px />";
                            }
                       echo"</div>";
                        if($arr[$i][7]==1)
                        {
              echo "<div class=reply >";
                        $obj1=new clsrep();
                        $obj1->repcod=$arr[$i][0];
                        $obj1->find_rec();
                echo "<b>Reply: </b><p>".$obj1->repdsc;
                        echo "</p>";
                         echo "<p><a class='btndft' href=index.php?pattt=".$obj1->repatt." >Download Reply Attachment</a></p>";
                        }
			echo "</div> </div>" ;
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
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
<!-- || Bootstrap Jquery || --> 
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script> 
<!-- || Respond Jquery || --> 
<script src="assets/js/respond.min.js" type="text/javascript"></script> 
<script src="assets/js/common.js" type="text/javascript"></script>
</body>
</html>
