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
			height:1600px;
			width:96%;
			border:2px solid black;
			background-color:white;
			border-radius:20px;
			background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQge36DbGAQWBDa3Cwc_LBlTR7T-JMr21re3A&s');
			background-repeat:no-repeat;
			background-size: cover;
		}
        </style>
    </head>
	<body>
	    <?php
				include('inc/header.php');
		?>		
		<div class="box">
			<div class="b1">
				<h2 align="center">CATEGORY</h2>
				<hr/>
				<?php
				$qs="select * from category";
				$data=mysqli_query($con,$qs) or die(mysqli_error($con));
				while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
				{
				?>
                <div class="a1"><div class="k1"><img src="images/<?php echo $row['cat_poster']; ?>"></div><div class="a2"><p><?php echo $row['cat_name']; ?></p></div></div>
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