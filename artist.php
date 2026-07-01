<?php
session_start();
if(!isset($_SESSION['user_name']))
{
	header('location:index.php');
}
include('inc/config.php');
$art_name="";
$art_dob="";
$art_gender="";
$art_city="";
$art_id="";
if(isset($_POST['save']))
{
	$art_name=$_POST['art_name'];
	$art_dob=$_POST['art_dob'];
	$art_gender=$_POST['art_gender'];
	$art_city=$_POST['art_city'];
	
	$art_poster=$_FILES['art_poster']['name'];
	
	move_uploaded_file($_FILES['art_poster']['tmp_name'],"upload/".$art_poster);
	$qs="insert into artist(art_name,art_dob,art_gender,art_city,art_poster)values('$art_name','$art_dob','$art_gender','$art_city','$art_poster')";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_POST['update']))
{
	$art_name=$_POST['art_name'];
	$art_dob=$_POST['art_dob'];
	$art_gender=$_POST['art_gender'];
	$art_city=$_POST['art_city'];
	$art_id=$_POST['art_id'];
	
	$art_poster=$_FILES['art_poster']['name'];
	
	move_uploaded_file($_FILES['art_poster']['tmp_name'],"upload/".$art_poster);
	$qs="update artist set art_name='$art_name',art_dob='$art_dob',art_gender='$art_gender',art_city='$art_city',art_poster='$art_poster' where art_id='$art_id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$qs="delete from artist where art_id='$id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
	
}
if(isset($_GET['eid']))
{
	$id=$_GET['eid'];
	$qs="select * from artist where art_id='$id'";
	$data=mysqli_query($con,$qs) or die(mysqli_error($con));
	$row=mysqli_fetch_array($data,MYSQLI_BOTH);
	$art_name=$row['art_name'];
	$art_dob=$row['art_dob'];
	$art_gender=$row['art_gender'];
	$art_city=$row['art_city'];
	$art_id=$row['art_id'];
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
					<table   class="b1">
						<tr>
							<th colspan="4">ARTIST</th>
						</tr>
						<tr>
							
							<td>Artist-Name</td>
							<td><input type="text" name="art_name" value="<?php echo $art_name; ?>"/>
								<input type="hidden" name="art_id" value="<?php echo $art_id; ?>"/>
							</td>
							<td>Artist-Dob</th>
							<td><input type="date" name="art_dob" value="<?php echo $art_dob; ?>"/></td>
						</tr>
						
						<tr>
							
							<td>Artist-Gender</td>
							<td>
							Male<input type="radio" name="art_gender" value="male" <?php if($art_gender=='male'){ echo "checked"; } ?>/>
							Female<input type="radio" name="art_gender" value="female" <?php if($art_gender=='female'){ echo "checked"; } ?>/>
							</td>
							
							<td>Artist-City</td>
							<td><input type="text" name="art_city" value="<?php echo $art_city; ?>"/></td>
						</tr>
						<tr>
							<td>Upload Poster</td>
							<td><input name="art_poster" type="file"></td>
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
						<th>Artist Name</th>
						<th>Artist DOB</th>
						<th>Artist Gender</th>
						<th>Artist City</th>
						<th>Poster</th>
						<th colspan="2">Action</th>
					</tr>
					
					
				<?php
					$qs="select * from artist";
					$sr=1;
					$data=mysqli_query($con,$qs) or die(mysqli_error($con));
					while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
					{
				?>		
						<tr> 
						<td><?php echo $sr++; ?></td>
						<td><?php echo $row['art_name']; ?></td>
						<td><?php echo $row['art_dob']; ?></td>
						<td><?php echo $row['art_gender']; ?></td>
						<td><?php echo $row['art_city']; ?></td>
						<td><img src="upload/<?php echo $row['art_poster']; ?>" style="width:50px;height:50px;"></td>
						<td><a onclick="return confirm('Are you sure to DELETE this item?')" href="artist.php?id=<?php echo $row['art_id']; ?>">DELETE </a></td>
						<td><a href="artist.php?eid=<?php echo $row['art_id']; ?>">EDIT </a></td>
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