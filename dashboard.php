<!doctype html>
<html>
	<head>
		<style>
			.box{
				height:600px;
				width:1500px;
				border:1px solid black;
			}
			.menu{
				height:600px;
				width:400px;
				border:1px solid black;
				float:left;
			}
			.left-box{
				height:600px;
				width:1096px;
				float:left;
			}
			.head{
				height:100px;
				width:1096px;
				border-bottom:1px solid black;
			}
			.board{
				height:500px;
				width:1095px;
			}
			.foot{
				height:100px;
				width:1500px;
				border:1px solid black;
			}
		</style>
	<head>
	<body>
		<div class="box">
			<div class="menu">
			  <table>
				<tr>
					<th><a href="dashboard.php">HOME</a></th>
				</tr>
				<tr>
					<th><a href="category.php">CATEGORY</a></th>
				</tr>
				<tr>
					<th><a href="album.php">ALBUM</a></th>
				</tr>
				<tr>
					<th><a href="artist.php">ARTIST</a></th>
				</tr>
				<tr>
					<th><a href="track.php">TRACK</a></th>
				</tr>
				<tr>
					<th><a href="production-house.php">PRODUCTION HOUSE</a></th>
				</tr>
			  </table>
			</div>
			<div class="left-box">
				<div class="head">
				    <div class="logo"><img src="images/img2.jpg"></div>
					<h1>MUSIC MANIA</h1>
				</div>
				<div class="board">
				    <div class="category"></div>
					<div class="album"></div>
					<div class="artist"></div>
					<div class="track"></div>
					<div class="production-house"></div>
				</div>
			</div>
		</div>
		<div class="foot">
		   <p>&copy; 2026 Music Mania production Designed for Music.</p>
		</div>
	</body>
</html>