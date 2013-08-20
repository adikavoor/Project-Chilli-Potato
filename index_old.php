<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
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
<div id="gkMenuWrapper">
	<div class="gkPage">
		<div id="gkMainMenu" class="gkPage">
				<nav id="gkExtraMenu" class="gkMenu">
					<ul class="gkmenu level0">
						<li class="first"><a href="http://watevermusic.com/" class=" first" id="menu640" title="home" onmouseover="">home</a></li>
						<li><a href="/articles" id="menu703" title="news" onmouseover="">news</a></li>
						<li><a href="/features" id="menu704" title="features" onmouseover="">features</a></li>
						<li><a href="/wemdb" id="menu705" title="WeMDb" onmouseover="">WeMDb</a></li>
						<li><a href="/contact-us" id="menu748" title="contact us" onmouseover="">contact us</a></li>
						<li class="last active"><a href="/db-test" class=" last active" id="menu787" title="db_test" onmouseover="">db_test</a></li>
						</ul>
				</nav>
		</div>
		
	</div>
</div>
<div id="gkTop" class="noheader">
	<div class="gkPage">
		<h1 class="gkLogo">
	     	<a href="http://watevermusic.com/ " id="gkLogo">
	        <img src="http://watevermusic.com/images/logo_final.png" alt="watevermusic.com">
	     	</a>
     		</h1>
     	</div>				
</div>
	
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
?>
<div class="dbContainer">
<ul class="grid effect-2" id="grid">

<?php
//execute the SQL query and return records
$result = mysql_query("SELECT id,name,image FROM bands");
//fetch tha data from the database
 
while ($row = mysql_fetch_array($result)) { ?>
<li>
<a href="bands.php/?band=<?php echo $row{'id'}; ?>">
<?php if($row{'image'} == null){ ?>
		<img style="width:100%;" src="http://placehold.it/1920x700">
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
	
<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/AnimOnScroll.js"></script>
		<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>
		
		<div id="gkBottom3" class="gkPage">
		<div class="gkCols6">
			<div class="box  gkmod-5"><h3 class="header">Music Database</h3><div class="content">

<div class="custom">

	<ul>
<li><a href="/artists?view=featured">Musicians</a></li>
<li><a href="/bands?view=featured">Bands / Artists</a></li>
<li><a href="/albums?view=featured">Albums</a></li>
<li><a href="/songs?view=featured">Songs</a></li>
<li><a href="/sound-designers?view=featured">Sound Engineers</a></li>
<li><a href="/producers?view=featured">Producers</a></li>
</ul>	
</div>
</div></div><div class="box  gkmod-5"><h3 class="header">Music &amp; More</h3><div class="content">

<div class="custom">

	<ul>
<li><a href="#">News Articles</a></li>
<li><a href="#">News Archive</a></li>
<li><a href="#">Upcoming Albums</a></li>
<li><a href="#">Latest Albums</a></li>
<li><a href="#">Events</a></li>
</ul>	
</div>
</div></div><div class="box  gkmod-5"><h3 class="header">Features</h3><div class="content">

<div class="custom">

	<ul>
	<li><a href="#">Lyrics</a></li>
	<li><a href="#">News Archive</a></li>
	<li><a href="#">Photos Archive</a></li>
	<li><a href="#">Videos Archive</a></li>
</ul>	
</div>
</div></div><div class="box  gkmod-5"><h3 class="header">Promote your band</h3><div class="content">

<div class="custom">

	<ul>
	<li><a href="#">Musicians</a></li>
  <li><a href="#">Bands / Artists</a></li>
  <li><a href="#">New Music</a></li>
	<li><a href="#">Reviews</a></li>
	<li><a href="#">Photos</a></li>
	<li><a href="#">Video</a></li>
	<li><a href="#">Blogs</a></li>
</ul>	
</div>
</div></div><div class="box  gkmod-5"><h3 class="header">Info</h3><div class="content">

<div class="custom">

	<ul>
<li><a href="#">About Us &amp; Contact</a></li>
<li><a href="#">Advertise</a></li>
<li><a href="#">Terms of Use</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Our Ads</a></li>
</ul>	
</div>
</div></div>
			
			<!--[if IE 8]>
	    		<div class="ie8clear"></div>
	    	<![endif]-->
		</div>
	</div>
	<footer id="gkFooter" class="gkPage">
	<div>
				
				
				<p id="gkCopyrights">© 2013, watevermusic.com. All Rights Reserved.</p>
				
			</div>
</footer>
</body>