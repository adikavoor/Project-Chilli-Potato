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
		
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
		<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
		<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
		<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
		<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/component.css"/>
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link rel="stylesheet" type="text/css" href="css/cards.css">
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
	<?php // get search results 
		?>
		
		
		<?php
			// create search query 
			//get search term
			$input = $_POST['find'];
			if($input == "")
			{
				echo "Enter a search term";
				exit;
			}
			$string = explode(" ",$input);
			
			$keyword_count = count($string);
			$sql = "SELECT id,name,image FROM bands Where" ;
			for($i=0; $i<$keyword_count;$i++)
			{
				if($i == 0)
				{
				}
				else
				{$sql = $sql . " OR ";}
				
				
				$sql = $sql . " name LIKE '%$string[$i]%'";
			
			}
			$sql = $sql . " ;";
			
		?>
		
		
		<?php
			//connect to database
			$username = "dkavoor_whatever";
			$password = "wateveradmin";
			$hostname = "localhost"; 
			
			//connection to the database
			$dbhandle = mysql_connect($hostname, $username, $password) 
			  or die("Unable to connect to MySQL");
			  //select a database to work with
			$selected = mysql_select_db("dkavoor_whatevermusic",$dbhandle) 
			  or die("Could not select examples");
		?>
		
		
		<?php
			//execute query
			//execute the SQL query and return records
			$result = mysql_query("$sql");
			//fetch tha data from the database
		?>
		
		
		

	
			
	 <!-- header Shit -->
	// <div class="container">
			
			<!-- menu -->
			

			
			<ul id="gn-menu" class="gn-menu-main">
				
				<li><a href="http://www.wemdb.in"><img style="width:160px;margin-top: 0.1em;" src="http://wemdb.in/images/webdb-1.png" alt="watevermusic.com"></a></li>
				<li><a href="http://www.watevermusic.com/"><img src="images/Watevermusic_logo.png"></a></li>
				<li>
								
									<div id="sb-search" class="sb-search">
										<form  name="search" method="post" action="search.php">
											<input class="sb-search-input" placeholder="search WEMDb.." type="text" value="" name="find" id="search" style="box-shadow:none !important;">
											<input class="sb-search-submit" type="submit" value="">
											<span class="sb-icon-search"></span>
										</form>
									</div>
					</li>			
			</ul>
			
			
			<!-- end menu -->
			
			
			
		</div>

  <!-- END OF HEADER SHIT -->
	<?php 
		
		$anymatches=mysql_num_rows($result);
		if ($anymatches == 0)
		{
		echo '<img style="width:100%;" src="images/No-results.jpg">';
		} ?>
		<div class="bandHeader" style="margin-top:25px;">
			<h3 class="header">your search for "<?php echo $input; ?>" returned "<?php echo $anymatches; ?>" results.</h3></div>
	<div id="content" class="container clearfix">

		
		<?php
			//display results
			while ($row = mysql_fetch_array($result)) { ?>
			<div class="item">
				
				<a href="bands.php/?band=<?php echo $row{'id'}; ?>">
				<div class="randomImage">
				<h3 class="header" style="font-size:25px;"><?php echo $row{'name'}; ?></h3>
					<?php if($row{'image'} == null){ ?>					
						<img style="width:100%;" src="images/no_image.jpg">
						<img class="hoverImage" src="images/band_hover.png">					
					<?php }else{ ?>
						<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
						<img class="hoverImage" src="images/band_hover.png">
					<?php } ?>
				</div>
				</a>
			</div>
			<?php } ?>
		
	</div>
	<!-- masonry script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="js/jquery.masonry.min.js"></script>
  <script src="js/script.js"></script>
  <!-- end masonry script -->
  
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
  <!-- search scripts -->
		<script src="js/classie.js"></script>
		<script src="js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>

		<!-- end search scripts -->
		<!-- menu scripts -->

<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>


<!-- end of menu scripts -->
	</body>
</html>