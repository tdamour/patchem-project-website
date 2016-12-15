<?php 

$errors = '';  
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	$errors .= "\nAll Fields are required"; 
	return false;
   }
   
 // create variables 
 $name = trim($_POST['name']); 
 $email = trim($_POST['email']); 
 $phone = trim($_POST['phone']); 
 $message = trim($_POST['message']); 
 
if(empty($errors))
{
 // set up static info
 $from = "tim.damour@timdamour.com";  
 $toAddress = "tim.damour@outlook.com";
  
 $subject = "Visitor Mail";

$mailcontent = "Visitor name: ".$name."\n".
				"Visitor email: ".$email."\n".
				"Visitor phone: ".$phone."\n\n".
				"Visitor message:\n\n".$message."\n";
$headers = "From: $from \r\n";				
$headers .= "Reply-To: $email\r\n"; 
$headers.="Return-Path: $email\r\n"; 
$headers.="X-Mailer: PHP \r\n"; 


// invoke mail() function to send mail 
mail($toAddress, $subject, $mailcontent, $headers);

header('Location: thank_you.html');
} 

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PATCHEM PROJECT</title>
    <meta charset="utf-8">
	<meta name="keywords" content=""> 
	<meta name="description" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" href="css/main.css"> 
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-inverse" id="nav"> 
	  <div class="container-fluid">
		<!-- PATCHEM LOGO --> 
		<header class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
			</button> 
			<a href="index.html" class="navbar-brand" id="navLogo">PATCHEM PROJECT</a>
		</header>	
			
		
		<!-- Navigation Items --> 
		  <div class="collapse navbar-collapse" id="mainNavBar"> 
			<ul class="nav navbar-nav" id="navLink"> 
			  <li class="active"><a href="index.html">HOME</a></li>
			  <li><a href="about.html">ABOUT</a></li> 
			  <li><a href="contact.html">CONTACT</a></li> 
			  
			  <!-- dropdown menu --> 
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">MORE <span class="caret"></span></a>
				<ul class="dropdown-menu" id="dropdownList">
				  <li> <a href="#">SUPPORT</a></li>
				  <li> <a href="#">ORGANIZATIONS</a></li>
				</ul>
			  </li>
			</ul>
		  </div>
		</div> 
	</nav>
		
		<!-- JumboTron Image --> 
		<section class="jumbotron" id="jumbotron"> 
			<div class="container-fluid">
				<div class="row text-center"> 
					<h2>"We hope for better things, it will arise from the ashes"</h2> 
				</div>
			</div> 
		</section>
		
		<!-- Basic Content Area --> 
		<section class="container-fluid" id="mail_handling_page">
		 <?php echo n12br($errors)?> 
		</section> 
	
	<!-- Footer Area --> 
	<footer class="text-center" id="footer">
		<div class="footer-above"> 
		  <div class="container">
		  <div class="row">
		    <div class=" pull-left" id="copyright"> 
				<p>&nbsp;&nbsp;&copy; PATCHEM PROJECT</p>  
			</div>
			<!-- Social Media --> 
			<div class="pull-right">
				<ul class="list-inline" id="socialMedia">
				  <li>
				    <a href="#"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
				  </li>
				  <li>
				    <a href="#"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
				  </li>
				   <li>
				    <a href="#"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
				  </li>
				  <li>
				    <a href="#"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
				  </li>
				</ul> 
			</div>
			</div>
		  </div> 
		  </div> 
		  <div class="footer-below">
		    <div class="container">
				<div class="row">
				  <div class="col-lg-12" id="proud">
					<p>Proud to be Detroit</p> 
				  </div> 
				</div> 
		  </div>
		  </div>
	</footer>
	<script src="js/flushBottom.js"> </script>
</body>
</html>