<?php
session_start();
if(!isset($_SESSION['user_name']))
{
	header('location:index.php');
}
include('inc/config.php');
$pro_name="";
$pro_id="";
if(isset($_POST['save']))
{
	$pro_name=$_POST['pro_name'];
		
	$pro_poster=$_FILES['pro_poster']['name'];
	
	move_uploaded_file($_FILES['pro_poster']['tmp_name'],"upload/".$pro_poster);
	$qs="insert into production_house(pro_name,pro_poster)values('$pro_name','$pro_poster')";

	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_POST['update']))
{
	$pro_name=$_POST['pro_name'];
	$pro_id=$_POST['pro_id'];
	
	$pro_poster=$_FILES['pro_poster']['name'];
	
	move_uploaded_file($_FILES['pro_poster']['tmp_name'],"upload/".$pro_poster);
	$qs="update production_house set pro_name='$pro_name',pro_poster='$pro_poster' where pro_id='$pro_id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$qs="delete from production_house where pro_id='$id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
	
}
if(isset($_GET['eid']))
{
	$id=$_GET['eid'];
	$qs="select * from production_house where pro_id='$id'";
	$data=mysqli_query($con,$qs) or die(mysqli_error($con));
	$row=mysqli_fetch_array($data,MYSQLI_BOTH);
	$pro_name=$row['pro_name'];
	$pro_id=$row['pro_id'];
}
?>
<!doctype html>
<html>
	<head>
	<link type="text/css" rel="stylesheet" href="css/music.css"> 
		<style>
		    
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
			    <form method="post" enctype="multipart/form-data">
					<table  class="b1">
						<tr>
							<th colspan="2">PRODUCTION-HOUSE</th>
						</tr>
						<tr>
							<td>Production-Name</td>
							<td><input type="text" name="pro_name" value="<?php echo $pro_name; ?>"/>
							    <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>"/>
							</td>
						</tr>
						<tr>
							<td>Upload Poster</td>
							<td><input name="pro_poster" type="file"></td>
						</tr>
					</table>
					<p align="center">
						<input type="submit" name="save" value="SAVE">
						<input type="submit" name="update" value="UPDATE">
					</p>
				</form>
				
				<hr>
				<br>
				<table class="t1" width="90%" align="center" border="1" cellpadding="30px" cellspacing="0">
					<tr>
						<th>Sr NO</th>
						<th>Production Name</th>
						<th>Poster</th>
						<th colspan="2">Action</th>
					</tr>
					
					
				<?php
					$qs="select * from production_house";
					$sr=1;
					$data=mysqli_query($con,$qs) or die(mysqli_error($con));
					while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
					{
					?>
						<tr>
						<td><?php echo $sr++; ?></td>
						<td><?php echo $row['pro_name']; ?></td>
						<td><img src="upload/<?php echo $row['pro_poster']; ?>" style="width:50px;height:50px;"></td>
						<td><a onclick="return confirm('Are you sure to DELETE this item?')" href="production.php?id=<?php echo $row['pro_id']; ?>">DELETE </a></td>
						<td><a href="production.php?eid=<?php echo $row['pro_id']; ?>">EDIT </a></td>
						</tr>
					<?php
					}
					?>
				</table>
			   </div>
			</div>
		</div>
		<?php
		  include('footer.php');
		?>
	</body>
</html>