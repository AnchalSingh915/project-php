<?php
include('inc/config.php');
?>
<!doctype html>
<html>
	<head>
	<link type="text/css" rel="stylesheet" href="css/music.css"> 
		<style>
		.box{
			margin:20px;
			height:1640px;
			width:98%;
			border:5px solid black;
			align-items:center;
			background-color:#272757;
			border-radius:20px;
		}
		.b1{
			margin:20px;
			height:300px;
			width:96%;
			border:2px solid black;
			background-color:white;
			border-radius:20px;
			background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQge36DbGAQWBDa3Cwc_LBlTR7T-JMr21re3A&s');
			background-repeat:no-repeat;
			background-size: cover;
		}
		.b1 a{
			float:right;
			color:black;
			margin-top:-50px;
			font-size:20px;
		}
		</style>
	<head>
	<body>
		<?php
			include('inc/header.php');
		?>
		<div class="box">
			<div class="b1">
				<h2 align="center">CATEGORY</h2>                 
				<a href="category.php">View all</a>
			
				<hr/>
				<?php
				$qs="select * from category limit 5";
				$data=mysqli_query($con,$qs) or die(mysqli_error($con));
				while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
				{
				?>
                <div class="a1"><div class="k1"><img src="images/<?php echo $row['cat_poster']; ?>"></div><div class="a2"><p><?php echo $row['cat_name']; ?></p></div></div>
				<?php
				
				}
				?>
			</div>
			<div class="b1">
			    <h2 align="center">ALBUM</h2>
				<a href="album.php">View all</a>
				<hr/>
				<?php
				$qs="select * from album limit 5";
				$data=mysqli_query($con,$qs) or die(mysqli_error($con));
				while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
				{
				?>
				<div class="a1"><div class="k1"><img src="images/<?php echo $row['alb_poster']; ?>"></div><div class="a2"><p><?php echo $row['alb_name']; ?></p></div></div>
                <?php
				
				}
				?>
			</div>
			<div class="b1">
			    <h2 align="center">ARTIST</h2>
				<a href="artist.php">View all</a>
				<hr/>
				<?php
				$qs="select * from artist limit 5";
				$data=mysqli_query($con,$qs) or die(mysqli_error($con));
				while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
				{
				?>
				<div class="a1"><div class="k1"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcTuN4J2Bw37T4t4rpn54gZATgv25zn933PA&s"></div><div class="a2"><p><?php echo $row['art_name']; ?></p></div></div>
				<?php
				
				}
				?>
			</div>
			<div class="b1">
			    <h2 align="center">PRODUCTION</h2>
				<a href="production.php">View all</a>
				<hr/>
				<?php
				$qs="select * from production_house limit 5";
				$data=mysqli_query($con,$qs) or die(mysqli_error($con));
				while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
				{
				?>
				<div class="a1"><div class="k1"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcTuN4J2Bw37T4t4rpn54gZATgv25zn933PA&s"></div><div class="a2"><p><?php echo $row['pro_name']; ?></p></div></div>
				<?php
				
				}
				?>
			</div>
			<div class="b1">
			    <h2 align="center">TRACK</h2>
				<a href="track.php">View all</a>
				<hr/>
				<?php
				$qs="select * from track limit 5";
				$data=mysqli_query($con,$qs) or die(mysqli_error($con));
				while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
				{
				?>
				<div class="a1"><div class="k1"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcTuN4J2Bw37T4t4rpn54gZATgv25zn933PA&s"></div><div class="a2"><p><?php echo $row['Tr_title']; ?></p></div></div>
				<?php
				
				}
				?>
			</div>
		</div>
		<?php
			include('inc/footer.php');
		?>
	</body>
</html>