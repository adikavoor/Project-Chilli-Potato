<!DOCTYPE html>
<html lang="en" class="no-js" style="height:100%;">
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
		<link rel="stylesheet" type="text/css" href="css/cards.css">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">
		<script src="js/modernizr.custom.js"></script>
		<script src="js/modernizr-2.5.3.min.js"></script>
		
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	</head>
	<body style="height:100%;">
	
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
		$result = mysql_query("SELECT id,name,image FROM bands ORDER BY RAND() LIMIT 0,8;");
		//fetch tha data from the database		 
	 ?>
		<div class="container">
			
			<!-- menu -->
			

			
			<ul id="gn-menu" class="gn-menu-main">
				
				<li><a href="http://www.wemdb.in"><img style="width:160px;margin-top: 0.1em;" src="http://wemdb.in/images/webdb-1.png" alt="watevermusic.com"></a></li>
				<li><a href="http://www.watevermusic.com/"><img src="images/Watevermusic_logo.png"></a></li>
				<li>
								
									<div id="sb-search" class="sb-search">
										<form>
											<input class="sb-search-input" placeholder="search WEMDb.." type="text" value="" name="search" id="search" style="box-shadow:none !important;">
											<input class="sb-search-submit" type="submit" value="">
											<span class="sb-icon-search"></span>
										</form>
									</div>
					</li>			
			</ul>
			
			
			<!-- end menu -->
			
			
			
		</div>
		<div class="searchBox">
				<div style="text-align:center;">
					<img src="images/webdb-1.png">
				</div>
				<form name="search" method="post" action="search.php" style="text-align:center;margin-top:20px;">
					<input type="text" name="find"  placeholder="search wemdb..." style="width:80%;"/> 
				</form>
			</div>
			
			<div class="wemdbBottom">
			<div class="bandHeader">
			<h3 class="header">have you heard about these bands?</h3></div>
			<div id="content" class="container clearfix">
				<?php while ($row = mysql_fetch_array($result)) { ?>
				<div class="item">
					<a href="bands.php/?band=<?php echo $row{'id'}; ?>" target="_blank">
					<?php if($row{'image'} != null) { ?>
						<div class="randomImage">
							<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
						</div>
					<?php } else { ?>
						<div class="randomImage">
							<img style="width:100%;" src="http://wemdb.in/images/no_image.jpg">
						</div>
					<?php } ?>
					<div class="bandHeader">
					<div class="bandName"><?php echo $row{'name'}; ?></div></div>
					</a>
				</div>
				<?php } ?>
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
<!-- masonry script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="js/jquery.masonry.min.js"></script>
  <script src="js/script.js"></script>
  <!-- end masonry script -->
		<!-- search scripts -->
		<script src="js/classie.js"></script>
		<script src="js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>

		<!-- end search scripts -->
	</body>
</html>