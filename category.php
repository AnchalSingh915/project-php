<?php
session_start();
if(!isset($_SESSION['user_name']))
{
	header('location:index.php');
}
include('inc/config.php');
$cat_name="";
$cat_id="";
if(isset($_POST['save']))
{
	$cat_name=$_POST['cat_name'];
	
	$cat_poster=$_FILES['cat_poster']['name'];
	
	move_uploaded_file($_FILES['cat_poster']['tmp_name'],"upload/".$cat_poster);
	$qs="insert into category(cat_name,cat_poster)values('$cat_name','$cat_poster')";
	echo mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_POST['update']))
{
	$cat_name=$_POST['cat_name'];
	$cat_id=$_POST['cat_id'];
	
	$cat_poster=$_FILES['cat_poster']['name'];
	
	move_uploaded_file($_FILES['cat_poster']['tmp_name'],"upload/".$cat_poster);
	$qs="update category set cat_name='$cat_name',cat_poster='$cat_poster' where cat_id='$cat_id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$qs="delete from category where cat_id='$id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}	
if(isset($_GET['eid']))
{
	$id=$_GET['eid'];
	$qs="select * from category where cat_id='$id'";
	$data=mysqli_query($con,$qs) or die(mysqli_error($con));
	$row=mysqli_fetch_array($data,MYSQLI_BOTH);
	$cat_name=$row['cat_name'];
	$cat_id=$row['cat_id'];
	
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
							<th colspan="2">CATEGORY</th>
						</tr>
						
						<tr>
							<td>Category-Name</td>
							<td><input type="text" name="cat_name" value="<?php echo $cat_name; ?>"/>
							<input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>"/>
							</td>
						</tr>
						<tr>
							<td>Upload Poster</td>
							<td><input name="cat_poster" type="file"></td>
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
						<th>Category Name</th>
						<th>Poster</th>
						<th colspan="2">Action</th>
					</tr>
				
					<?php
					$qs="select * from category";
					$sr=1;
					$data=mysqli_query($con,$qs) or die(mysqli_error($con));
					while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
					{
					?>
					<tr>
						<td><?php echo $sr++; ?></td>
						<td><?php echo $row['cat_name']; ?></td>
						<td><img src="upload/<?php echo $row['cat_poster']; ?>" style="width:50px;height:50px;"></td>
						<td><a onclick="return confirm('Are you sure to DELETE this item?')" href="category.php?id=<?php echo $row['cat_id']; ?>">DELETE </a> </td>
						<td><a href="category.php?eid=<?php echo $row['cat_id']; ?>">EDIT </a> </td>
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