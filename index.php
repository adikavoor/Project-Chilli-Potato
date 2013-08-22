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
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">
		<script src="js/modernizr.custom.js"></script>
		
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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
			
			<!-- menu -->
			
			
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<form name="search" method="post" action="search.php">
									<input placeholder="search wemdb..." autocomplete="off" name="find" type="search" class="gn-search" >
									</form>
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li>
									<a class="gn-icon gn-icon-discover">discover</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-band">bands</a></li>
										<li><a class="gn-icon gn-icon-artists">artists</a></li>
										<li><a class="gn-icon gn-icon-albums">albums</a></li>
										<li><a class="gn-icon gn-icon-songs">songs</a></li>
									</ul>
								</li>
								
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="http://www.wemdb.in"><img style="width:160px;margin-top: 0.4em;" src="http://wemdb.in/images/webdb-1.png" alt="watevermusic.com"></a></li>
				<li><a href="http://www.watevermusic.com/"><img src="images/Watevermusic_logo.png"></a></li>
			</ul>
			
			
			<!-- end menu -->

			
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

		<!-- google analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43354164-1', 'wemdb.in');
  ga('send', 'pageview');

</script>
<!-- end of google analytics -->

<!-- menu scripts -->

<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>


<!-- end of menu scripts -->
		
	</body>
</html>