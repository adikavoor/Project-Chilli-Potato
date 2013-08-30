<head>

<!-- DB Shit -->
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
<?php
$album = $_GET['album'];?>
<?php
//execute the SQL query and return records
$result = mysql_query("SELECT * FROM albums where id=$album");
$row = mysql_fetch_array($result);
$songs = mysql_query("SELECT name,length FROM songs WHERE album_id=$album");
?>
<!-- end of the DB Shit -->
<meta charset="utf-8">
  <title><?php echo $row{'name'};?> - wemdb.in</title>  
  <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
  <meta name="viewport" content="width=device-width">

  <!-- facebook property tags for open graph -->
  
  <meta property="og:image" content="http://www.watevermusic.com/images/db/<?php echo $row{'image'};?>">
  <meta property="og:image:type" content="image/jpg">
  <meta property="og:title" content="<?php echo $row{'name'};?>"/>
  <meta property="og:url" content="http://www.wemdb.in/albums.php/?album=<?php echo $row{'id'};?>"/>
  <meta property="og:site_name" content="wemdb.in"/>
  
  
  <!-- end of fb open graph tags -->

<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">
<link rel="stylesheet" type="text/css" href="../css/bands.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<link rel="stylesheet" type="text/css" href="../css/cards.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/component.css"/>
<link rel="stylesheet" type="text/css" href="../css/shadowbox.css">
<script src="../js/modernizr-2.5.3.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
<!-- menu -->
			
			<ul id="gn-menu" class="gn-menu-main">
				
				<li><a href="http://www.wemdb.in"><img style="width:160px;margin-top: 0.1em;" src="http://wemdb.in/images/webdb-1.png" alt="watevermusic.com"></a></li>
				<li><a href="http://www.watevermusic.com/"><img src="../images/Watevermusic_logo.png" style="margin-top: 0.1em;"></a></li>
				<li>								
					<div id="sb-search" class="sb-search">
						<form  name="search" method="post" action="../search.php">
							<input class="sb-search-input" placeholder="search WEMDb.." type="text" value="" name="find" id="search" style="box-shadow:none !important;">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
				</li>			
			</ul>
			
			<!-- end menu -->

	<div class="bandHeader">				
		<h3 class="header"><?php echo $row{'name'};?></h3>
	</div>
	<div id="content" class="container clearfix">
	<!-- album image + info box -->
		<div class="item cover">
			<?php if($row{'image'} == null){ ?>
				<img style="width:100%;" src="../images/no_image.jpg">
			<?php }else{ ?>
				<a href="http://watevermusic.com/images/db/<?php echo $row{'image'};?>" rel="shadowbox">
					<div class="randomImage">
						<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
						<img class="hoverImage" src="../images/album_zoom_hover.png" style="width:100%;">
					</div>
				</a>
			<?php } ?>
			<div class="dbblock">
				
				<?php if($row{'year'} != null) { ?>
					<div class="statblock">
						year <br><span><?php echo $row{'year'};?> </span>
					</div>
				<?php  } else { }?>
				
				<?php if($row{'genre'} != null) { ?>
					<div class="statblock">
						genre <br><span><?php echo $row{'genre'};?> </span>
					</div>
				<?php  } else { }?>
				
				<?php if($row{'length'} != null) { ?>
					<div class="statblock">
						length <br><span><?php echo $row{'length'};?> </span>
					</div>
				<?php  } else { }?>
				
				<?php if($row{'label'} != null) { ?>
					<div class="statblock">
						label <br><span><?php echo $row{'label'};?> </span>
					</div>
				<?php  } else { }?>
				
				<?php if($row{'producer'} != null) { ?>
					<div class="statblock">
						producer <br><span><?php echo $row{'producer'};?> </span>
					</div>
				<?php  } else { }?>
				
			</div>
		</div>
	<!-- end of album image + info box -->
	
	<!-- album description -->
		<div class="item bio featured">
			<div class="gridSpacer" style="padding-top:0px;">
			<?php if($row{'desc'} != null) { 
				 echo $row{'desc'};
				  } else{ 
				 echo 'desc Not Found';
			} ?>
			</div>
		</div>
	<!-- end album descirption -->
	
	<!-- track listing -->
		<div class="item featured">
			<h3 class="header">track listing</h3>
			<?php while ($song = mysql_fetch_array($songs)) { ?>
				<div class="statblock">
				<?php echo $song{'name'};?><br><span><?php echo $song{'length'};?> </span>
				</div>
			<?php } ?>
		</div>
	<!-- end track listing -->
		
	</div>
<div class="shareBar">

	<!-- fb like -->
	<div class="fb-like" data-href="http://www.wemdb.in/bands.php/?band=<?php echo $row{'id'};?>" data-width="450" data-layout="button_count" data-show-faces="true" data-send="false"></div>
	
	<!-- twitter tweet -->
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.wemdb.in/bands.php/?band=<?php echo $row{'id'};?>" data-via="watevermusic" data-hashtags="watevermsuic" data-dnt="true">Tweet</a>
	
	<!-- google +1 -->
	<div class="g-plusone" data-size="medium"></div>
	
	<!-- pinterest pin it -->
	<a href="//pinterest.com/pin/create/button/?url=http://www.wemdb.in/bands.php/?band=<?php echo $row{'id'};?>&media=http://watevermusic.com/images/db/<?php echo $row{'image'};?>&description=<?php echo $row{'bio'};?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
	
	<!-- stumbleupon button -->
	<su:badge layout="1"></su:badge>
	
	
</div>
<footer id="gkFooter" class="gkPage">
	<div>
		<p id="gkCopyrights">© 2013, watevermusic.com. All Rights Reserved.</p>
	</div>
</footer>



<!-- masonry script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery-1.7.1.min.js"><\/script>')</script>

  <script src="../js/jquery.masonry.min.js"></script>
  <script src="../js/script.js"></script>
  <!-- end masonry script -->
  
  <!-- fb js scripts -->
  
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=306813872789574";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
  <!-- end fb js scripts -->
  
  <!-- twitter scripts -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

  <!-- end twitter scripts -->
  
  <!-- g+1 scripts -->
  <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
  <!-- end g+1 scripts -->
  
  <!-- pinterest scripts -->
  <script type="text/javascript">
(function(d){
  var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
  p.type = 'text/javascript';
  p.async = true;
  p.src = '//assets.pinterest.com/js/pinit.js';
  f.parentNode.insertBefore(p, f);
}(document));
</script>
  <!-- end pinterest scripts -->
  
  <!-- stumbleupon scripts -->
  <script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>


  <!-- end stumbleupon scripts -->
  
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

<script src="../js/classie.js"></script>
		<script src="../js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>


<!-- end of menu scripts -->
<!-- search scripts -->
		<script src="../js/classie.js"></script>
		<script src="../js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>

		<!-- end search scripts -->

<!-- shadowbox scripts -->
<script type="text/javascript" src="../js/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init();
</script>
<!-- end shadowbox scripts -->
</body>