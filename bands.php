<!doctype html>
<html class="no-js" lang="en">
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
$band = $_GET['band'];?>
<?php
//execute the SQL query and return records
$result = mysql_query("SELECT * FROM bands where id=$band");
$members = mysql_query("SELECT DISTINCT t0.name, t0.id FROM artists t0,bands t1,band_members t2 where t2.band_id=$band and t2.member_id=t0.id and t2.current_status=1");
$former_members = mysql_query("SELECT DISTINCT t0.name, t0.id FROM artists t0,bands t1,band_members t2 where t2.band_id=$band and t2.member_id=t0.id and t2.current_status=0");
$albums = mysql_query("SELECT albums.name, albums.id, albums.image FROM albums ,discography where discography.band_id=$band and discography.album_id=albums.id");
$row = mysql_fetch_array($result);
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
  <meta property="og:url" content="http://www.wemdb.in/bands.php/?band=<?php echo $row{'id'};?>"/>
  <meta property="og:site_name" content="wemdb.in"/>
  
  
  <!-- end of fb open graph tags -->


<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">
<link rel="stylesheet" type="text/css" href="../css/bands.css">
<link rel="stylesheet" type="text/css" href="../css/cards.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/component.css"/>
  <script src="../js/modernizr-2.5.3.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/menu.css" />
</head>
<body>


  <!-- END OF HEADER SHIT -->
  
  <!-- menu -->
			
			<div class="content">
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
				<li><a href="http://www.watevermusic.com/"><img src="../images/Watevermusic_logo.png"></a></li>
			</ul>
			</div>
			
			<!-- end menu -->
   <!-- the main container for the cards -->
  <div id="content" class="container clearfix">
    
	
	
	<!-- band Image -->
    <div class="item featured">
	<h3 class="header"><?php echo $row{'name'};?></h3>
      <?php if($row{'image'} == null){ ?>
		<img style="width:100%;" src="/images/no_image.jpg">
	<?php }else{ ?>
		<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
		<?php } ?>
    </div>
    <!-- END OF band Image -->
	
	<!-- band bio -->
    <div class="item featured">
		<h3 class="header">bio</h3>
		<div class="gridSpacer">
			<?php if($row{'bio'} != null) { 
				 echo $row{'bio'};
				  } else{ 
				 echo 'Bio Not Found';
			} ?>
		</div>
    </div>
    <!-- END OF band bio -->
	
	<!-- Band Info -->
    <div class="item">
      <div class="dbblock">
			<h3 class="header">information</h3>
			
			<?php if($row{'year'} != null) { ?>
			<div class="statblock">
				year formed <br><span><?php echo $row{'year'};?> </span>
			</div>
			<?php  } else { }?>
			
			<?php if($row{'origin'} != null) { ?>
			<div class="statblock">
				origin <br><span><?php echo $row{'origin'};?> </span>
			</div>
			<?php  } else { }?>
			
			<?php if($row{'genre'} != null) { ?>
			<div class="statblock">
				genres <br><span><?php echo $row{'genre'};?> </span>
			</div>
			<?php  } else { }?>
			
			<?php if($row{'label'} != null) { ?>
			<div class="statblock">
				labels <br><span><?php echo $row{'label'};?> </span>
			</div>
			<?php  } else { }?>
			
			<?php if($row{'manager'} != null) { ?>
			<div class="statblock">
				manager <br><span><?php echo $row{'manager'};?> </span>
			</div>
			<?php  } else { }?>
		</div>
    </div>
    <!-- END of band info -->
	
	<!-- band members -->
    <div class="item">
      <div class="dbblock">
						<h3 class="header">band members</h3>
						<?php while ($row_members = mysql_fetch_array($members)) { ?>
							<div class="statblock">
								<a class ="artistLink" href="../artist.php/?artist=<?php echo $row_members{'id'}; ?>"><?php echo $row_members{'name'};?></a>
							</div>
						<?php } ?>
					</div>
    </div>
	<!-- end of band member -->
    
	<!-- former members -->
   
						
						<?php if($former_members != null) { ?>
							<div class="item">
							<h3 class="header">former members</h3>
								<div class="dbblock">
									<?php while ($row_members_former = mysql_fetch_array($former_members)) { ?>
										<div class="statblock">
										<a class="artistLink" href="../artist.php/?artist=<?php echo $row_members_former{'id'}; ?>"><?php echo $row_members_former{'name'};?></a>
										</div>								
									<?php }  ?>
								</div>
							</div>
						<?php } else { echo 'nobody!!'; } ?>
					
	<!-- end of former members -->
    
	<!-- social links -->
    <div class="item">
      <h3 class="header">social</h3>
			<!-- website link -->
			<?php if($row{'website'} != null) { ?>
				<div class="socialLink">
					<div class="spacer">
						<a class="artistLink" href="<?php echo $row{'website'};?>" target="_blank"><img src="../images/website.png"></a>
					</div>
				</div>
			<?php } else { }?>
			
			<!-- fb link -->
			<?php if($row{'facebook'} != null) { ?>
				<div class="socialLink">
					<div class="spacer">
						<a class="artistLink" href="<?php echo $row{'facebook'};?>" target="_blank"><img src="../images/facebook500.png"></a>
					</div>
				</div>
			<?php } else { }?>
							
			<!-- twitter link -->
			<?php if($row{'twitter'} != null) { ?>
				<div class="socialLink">
					<div class="spacer">
						<a class="artistLink" href="<?php echo $row{'twitter'};?>" target="_blank"><img src="../images/twitter.png"></a>
					</div>
				</div>
			<?php } else { }?>
			
			<!-- youtube link -->
			<?php if($row{'youtube'} != null) { ?>
				<div class="socialLink">
					<div class="spacer">
						<a class="artistLink" href="<?php echo $row{'youtube'};?>" target="_blank"><img src="../images/youtube.png"></a>
					</div>
				</div>
			<?php } else { }?>
			
			<!-- soundcloud link -->
			<?php if($row{'soundcloud'} != null) { ?>
				<div class="socialLink">
					<div class="spacer">
						<a class="artistLink" href="<?php echo $row{'soundcloud'};?>" target="_blank"><img src="../images/soundcloud.png"></a>
					</div>
				</div>
			<?php } else { }?>
			
							
    </div>
    <!-- end of social links -->
		
	<!-- discography -->
	<?php while ($row_albums = mysql_fetch_array($albums)) { ?>
		
		<div class="item album">
		
		<a href="../album.php/?album=<?php echo $row_albums{'id'}; ?>"><h3 class="header">album</h3><img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row_albums{'image'};?> ">
								<div class="albumName"><?php echo $row_albums{'name'};?></div></a>
		</div>
		
	<?php } ?>
	<!-- end of discography -->
	
    <!-- Image Gallery -->
		
	<!-- end of image gallery -->
	
  </div>
<!-- end of card conteiner -->
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
</body>


</html>