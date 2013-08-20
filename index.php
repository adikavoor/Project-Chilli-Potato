<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>wemdb</title>
		<meta name="description" content="wemdb" />
		<meta name="keywords" content="wemdb, music, database, india, indian, independent, scene, indie" />
		<meta name="author" content="Aditya Kavoor" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
	
	<?php
		$username = "dkavoor_whatever";
		$password = "wateveradmin";
		$hostname = "localhost"; 
		
		//connection to the database
		$dbhandle = mysql_connect($hostname, $username, $password) 
		  or die("Unable to connect to MySQL");
		?>
		<?php
		//select a database to work with
		$selected = mysql_select_db("dkavoor_whatevermusic",$dbhandle) 
		  or die("Could not select examples");
	
		//execute the SQL query and return records
		$result = mysql_query("SELECT * FROM bands ORDER BY RAND() LIMIT 0,1;");
		//fetch tha data from the database		 
	 ?>
		<div class="container">
			
			<div id="gkMenuWrapper">
				<div class="gkPage">
					<div id="gkMainMenu" class="gkPage">
						<nav id="gkExtraMenu" class="gkMenu">
							<ul class="gkmenu level0">
								<li class="first"><a href="http://watevermusic.com/" class=" first active" id="menu640" title="home" onmouseover="">watevermusic.com</a></li>
								
							</ul>
						</nav>
					</div>	
				</div>
			</div>

			
			<div class="main">
				<ul id="cbp-bislideshow" class="cbp-bislideshow">
					<li><img src="images/1.jpg" alt="image01"/></li>
					<li><img src="images/2.jpg" alt="image02"/></li>
					<li><img src="images/3.jpg" alt="image03"/></li>
					<li><img src="images/4.jpg" alt="image04"/></li>
					<li><img src="images/5.jpg" alt="image05"/></li>
				</ul>
							
				<div id="cbp-bicontrols" class="cbp-bicontrols">
					<div>
						<img src="images/webdb-1.png">
					</div>
					<form name="search" method="post" action="search.php">
			 			<input type="text" name="find"  placeholder="search wemdb..."/> 
			 		</form>
				</div>
						
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
		<script src="js/jquery.imagesloaded.min.js"></script>
		<script src="js/cbpBGSlideshow.min.js"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>
		<div class="wemdbBottom">
		
			<?php while ($row = mysql_fetch_array($result)) { ?>
			<a href="bands.php/?band=<?php echo $row{'id'}; ?>" target="_blank">
			<?php if($row{'image'} != null) { ?>
			<div class="randomImage">
				<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
			</div>
			<?php } else { ?>
			<div class="randomImage">
				<img style="width:100%;" src="/images/no_image.jpg">
			</div>
			<?php } ?>
			<div class="randomInfo">
				<h3 class="header">have you heard about <br><span><?php echo $row{'name'}; ?><span style="color:#FF6B09">?</span> </span></h3>
				
			</div>
			</a>
			<?php } ?>
		</div>	

	</body>
</html>