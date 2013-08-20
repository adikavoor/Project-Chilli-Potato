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
	
	<?php // top bar 
	?>
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
		
		
		

	<div class="searchHeader">
		<img src="images/webdb-1.png">
	</div>
	<form name="search" method="post" action="search.php">
	 	<input type="text" name="find"  placeholder=" <?php echo $input ?> "/> 
	</form>
			<?php 
		
		$anymatches=mysql_num_rows($result);
		if ($anymatches == 0)
		{
		echo '<img style="width:100%;" src="images/No-results.jpg">';
		} ?>
	<div class="dbContainer">

		<ul class="grid effect-2" id="grid">
		<?php
			//display results
			while ($row = mysql_fetch_array($result)) { ?>
			<li>
				<a href="bands.php/?band=<?php echo $row{'id'}; ?>">
					<?php if($row{'image'} == null){ ?>
						<img style="width:100%;" src="/images/no_image.jpg">
					<?php }else{ ?>
						<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
					<?php } ?>
					
					<div class="cardName">
						<span style="" ><?php echo $row{'name'}; ?></span>
					</div>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	</body>
</html>