<?php
session_start();
if(!isset($_SESSION['user_name']))
{
	header('location:index.php');
}
?>

<!doctype html>
<html>
	<head>
	<link type="text/css" rel="stylesheet" href="css/music.css"> 
		<style>
			.board h2{
				font-size:16px;
				color:white;
			}
			.category,.album, .artist, .track, .production-house, .a, .b, .c{
				height:170px;
				width:200px;
				border:1px solid black;
				float:left;
				margin-left:60px;
				margin-top:40px;
				background:#1f1f1f;
				border-radius:12px;
				font-size:30px;
			}
			.sbox{
				height:100px;
				width:175px;
				border:1px solid black;	
				margin:10px;
				background:#2a2a2a;
				border-radius:8px;
				font-size:90px;
				text-align:center;
			}
		</style>
	<head>
	<body>
		<div class="box">
			<?php
				include('menu.php');
			?>
			<?php
				include('header.php');
			?>
			
			<div class="left-box">
				<div class="board">
				    <div class="category">
						<div class="sbox">10</div>
						<h2 align="center">CATEGORY</h2>
					</div>
					<div class="album">
						<div class="sbox">10</div>
						<h2 align="center">ALBUM</h2>
					</div>
					<div class="artist">
						<div class="sbox">10</div>
						<h2 align="center">ARTIST</h2>
					</div>
					<div class="track">
						<div class="sbox">10</div>
						<h2 align="center">TRACK</h2>
					</div>
					<div class="production-house">
						<div class="sbox">10</div>
						<h2 align="center">PRODUCTION</h2>
					</div>
					<div class="a"></div>
					<div class="b"></div>
					<div class="c"></div>
				</div>
			</div>
		</div>		
		<?php
		  include('footer.php');
		?>
	</body>
</html>