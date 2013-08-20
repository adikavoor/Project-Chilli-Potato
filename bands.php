<head>
<link rel="stylesheet" type="text/css" href="../css/bands.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/layout.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/template.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/k2.css">
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/menu/menu.css" />
<link rel="stylesheet" type="text/css" href="http://watevermusic.com/templates/gk_rockwall/css/override.css">


</head>
<body>
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
	<div class="gkPage" style="margin: 2em 0 0 0 !important;">
		<h1 class="gkLogo" style="padding:5px;">
	     	<a href="http://wemdb.in/ " id="gkLogo">
	        <img src="/images/webdb-1.png" alt="watevermusic.com">
	     	</a>
     		</h1>
     		
     	</div>	
     		<form  style="margin-bottom: 0;" name="search" method="post" action="search.php">
	 	<input type="text" name="find"  placeholder="search wemdb.. "/> 
	</form>		
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
<?php
$band = $_GET['band'];?>
<?php
//execute the SQL query and return records
$result = mysql_query("SELECT * FROM bands where id=$band");
$members = mysql_query("SELECT DISTINCT t0.name, t0.id FROM artists t0,bands t1,band_members t2 where t2.band_id=$band and t2.member_id=t0.id and t2.current_status=1");
$former_members = mysql_query("SELECT DISTINCT t0.name, t0.id FROM artists t0,bands t1,band_members t2 where t2.band_id=$band and t2.member_id=t0.id and t2.current_status=0");
$albums = mysql_query("SELECT albums.name, albums.id, albums.image FROM albums ,discography where discography.band_id=$band and discography.album_id=albums.id");
while ($row = mysql_fetch_array($result)) { 
?>
<article id="k2Container" class="itemView">
<header class="itemHasImage">
	<figure class="itemImageBlock">
	<?php if($row{'image'} == null){ ?>
		<img style="width:100%;" src="/images/no_image.jpg">
	<?php }else{ ?>
		<img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row{'image'};?>">
		<?php } ?>
	</figure>
	<h1>
		<?php echo $row{'name'};?>
	</h1>
</header>
<div class="itemBody">
	<div class="itemFullText">
		<div class="gridpage">
			<div class="gkCols6">
			
				<div class="box  gkmod-2">
					<div class="dbblock">
						<h3 class="header">
							bio
						</h3>
						<div class="artistSpacer">
							<?php if($row{'bio'} != null) { 
							 echo $row{'bio'};
							  } else{ 
							 echo 'Bio Not Found';
							  } ?>
							 
							
						</div>
					</div>
				</div> 
				
				<div class="box  gkmod-4">
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
					
					<div class="dbblock">
						<h3 class="header">band members</h3>
						<?php while ($row_members = mysql_fetch_array($members)) { ?>
							<div class="statblock">
								<a class ="artistLink" href="../artist.php/?artist=<?php echo $row_members{'id'}; ?>"><?php echo $row_members{'name'};?></a>
							</div>
						<?php } ?>
					</div>
					
					<div class="dbblock">
						<h3 class="header">former members</h3>
						<?php if($former_members != null) { ?>
						<?php while ($row_members_former = mysql_fetch_array($former_members)) { ?>
							<div class="statblock">
								<a class="artistLink" href="../artist.php/?artist=<?php echo $row_members_former{'id'}; ?>"><?php echo $row_members_former{'name'};?></a>
							</div>
							
						<?php }  ?>
						<?php } else { echo 'nobody!!'; } ?>
					</div>
					
					
					<div class="dbblock">
						<h3 class="header">Links</h3>
						
						<div class="spacer">
						
							<?php if($row{'website'} != null) { ?>
							<a class="artistLink" href="<?php echo $row{'website'};?>" target="_blank"><?php echo $row{'website'};?></a>
							<br><br>
							<?php } else { }?>
							
							<?php if($row{'facebook'} != null) { ?>
							<div class="infoImg">
								<a href="<?php echo $row{'facebook'};?>" target="_blank"><img src="../images/social/fb.png"> </a>
							</div>
							<?php } else { }?>
							
							<?php if($row{'twitter'} != null) { ?>
							<div class="infoImg">
								<a href="<?php echo $row{'twitter'};?>" target="_blank"><img src="../images/social/twitter.png"> </a>
							</div>
							<?php } else { }?>
							
							<?php if($row{'youtube'} != null) { ?>
							<div class="infoImg">
								<a href="<?php echo $row{'youtube'};?>" target="_blank"><img src="../images/social/youtube.png"> </a>
							</div>
							<?php } else { }?>
							
							<?php if($row{'soundcloud'} != null) { ?>
							<div class="infoImg">
								<a href="<?php echo $row{'soundcloud'};?>" target="_blank"><img src="../images/social/soundcloud.png"> </a>
							</div>
							<?php } else { }?>
						</div>
					</div>
					
				</div>
				<div class="box  gkmod-4">
					<h3 class="header">discography</h3>
					<div class="gridpage discography" style="margin:15px;">
						<div class="gkCols6">
						
							<?php while ($row_albums = mysql_fetch_array($albums)) { ?>
							<div class="box  gkmod-2 album" style="text-align:center;">
								<a href="../album.php/?album=<?php echo $row_albums{'id'}; ?>"><img style="width:100%;" src="http://watevermusic.com/images/db/<?php echo $row_albums{'image'};?> ">
								<?php echo $row_albums{'name'};?></a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
<?php } ?>
</article>


	<footer id="gkFooter" class="gkPage">
	<div>
				
				
				<p id="gkCopyrights">© 2013, watevermusic.com. All Rights Reserved.</p>
				
			</div>
</footer>
</body>