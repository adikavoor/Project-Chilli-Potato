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
  
</head>
<body>
  <!-- header Shit -->
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
<div id="gkTop" class="noheader">
	<div class="gkPage">
		<h1 class="gkLogo" style="padding:5px;">
	     	<a href="http://wemdb.in/ " id="gkLogo">
	        <img src="http://wemdb.in/images/webdb-1.png" alt="watevermusic.com">
	     	</a>
     		</h1>
     		
     	</div>	
     		<form  style="margin-bottom: 0;" name="search" method="post" action="../search.php">
	 	<input type="text" name="find"  placeholder="search wemdb.. "/> 
	</form>		
</div>

  <!-- END OF HEADER SHIT -->
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
								<span><?php echo $row_albums{'name'};?></span></a>
		</div>
		
	<?php } ?>
	<!-- end of discography -->
	
    <!-- Image Gallery -->
		
	<!-- end of image gallery -->
	
  </div>
<!-- end of card conteiner -->
<div class="shareBar">
	<span class='st_facebook_hcount' displayText='Facebook'></span>
	<span class='st_twitter_hcount' displayText='Tweet'></span>
	<span class='st_googleplus_hcount' displayText='Google +'></span>
	<span class='st_pinterest_hcount' displayText='Pinterest'></span>
	<span class='st_stumbleupon_hcount' displayText='StumbleUpon'></span>
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
  
	<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-ad8216ff-9455-f465-ad67-d3a28ebb892f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


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
</body>


</html>