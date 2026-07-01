<?php
session_start();
if(!isset($_SESSION['user_name']))
{
	header('location:index.php');
}

include('inc/config.php');
$alb_name="";
$alb_release_date="";
$alb_pro_id="";
$alb_cat_id="";
$alb_id="";
if(isset($_POST['save']))
{
	$alb_name=$_POST['alb_name'];
	$alb_release_date=$_POST['alb_release_date'];
	$alb_cat_id=$_POST['alb_cat_id'];
	$alb_pro_id=$_POST['alb_pro_id'];
	
	$alb_poster=$_FILES['alb_poster']['name'];
	
	move_uploaded_file($_FILES['alb_poster']['tmp_name'],"upload/".$alb_poster);
	$qs="insert into album(alb_name,alb_release_date,alb_cat_id,alb_pro_id,alb_poster)values('$alb_name','$alb_release_date','$alb_cat_id','$alb_pro_id','$alb_poster')";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_POST['update']))
{
	$alb_name=$_POST['alb_name'];
	$alb_release_date=$_POST['alb_release_date'];
	$alb_pro_id=$_POST['alb_pro_id'];
	$alb_cat_id=$_POST['alb_cat_id'];
	$alb_id=$_POST['alb_id'];
	
	$alb_poster=$_FILES['alb_poster']['name'];
	
	move_uploaded_file($_FILES['alb_poster']['tmp_name'],"upload/".$alb_poster);
	$qs="update album set alb_name='$alb_name',alb_release_date='$alb_release_date',alb_cat_id='$alb_cat_id',alb_pro_id='$alb_pro_id',alb_poster='$alb_poster' where alb_id='$alb_id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$qs="delete from album where alb_id='$id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));	
}


if(isset($_GET['eid']))
{
	$id=$_GET['eid'];
	$qs="select * from album where alb_id='$id'";
	$data=mysqli_query($con,$qs) or die(mysqli_error($con));	
	$row=mysqli_fetch_array($data,MYSQLI_BOTH);
	$alb_name=$row['alb_name'];
	$alb_release_date=$row['alb_release_date'];
	$alb_pro_id=$row['alb_pro_id'];
	$alb_cat_id=$row['alb_cat_id'];
	$alb_id=$row['alb_id'];
	
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
			    <form  method="post" enctype="multipart/form-data">
					<table  class="b1" >
						<tr>
							<th colspan="4">ALBUM</th>
						</tr>
						<tr>
							<td>Album-Name</td>
							<td><input type="text" name="alb_name" value="<?php echo $alb_name; ?>"/>
								<input type="hidden" name="alb_id" value="<?php echo $alb_id; ?>"/>
							</td>
							<td>Album-Release-Date</td>
							<td>
							
							<input type="date" name="alb_release_date" value="<?php echo $alb_release_date; ?>"/>
								
							</td>
						</tr>
						
						<tr>
							<td>Category</td>
							<td>
								<select name="alb_cat_id">
									<option value="">Select Any One</option>
									<?php
									$qs="select * from category order by cat_name";
									$data=mysqli_query($con,$qs) or die(mysqli_error($con));
									while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
									{
										
										if($alb_cat_id==$row['cat_id'])
										{
											echo "<option value='".$row['cat_id']."' selected>".$row['cat_name']."</option>";
										}
										else
										{
											echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
										}
									}
									?>
								</select>
									
							</td>
							<td>Production</td>
							<td>
								<select name="alb_pro_id">
									<option value="">Select Any One</option>
									<?php
									$qs="select * from production_house order by pro_name";
									$data=mysqli_query($con,$qs) or die(mysqli_error($con));
									while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
									{
										if($alb_pro_id==$row['pro_id'])
										{
											echo "<option value='".$row['pro_id']."' selected>".$row['pro_name']."</option>";
										}
										else
										{
											echo "<option value='".$row['pro_id']."'>".$row['pro_name']."</option>";
										}
									}
									?>
								</select>
									
							</td>
						</tr>
						<tr>
							<td>Upload Poster</td>
							<td><input name="alb_poster" type="file"></td>
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
						<th>Album Name</th>
						<th>Album Ralease Date</th>
						<th>Category </th>
						<th>Production-House</th>
						<th>Poster</th>
						<th colspan="2">Action</th>
					</tr>
					
					
				<?php
					$qs="select * from album inner join category on alb_cat_id = cat_id inner join production_house on alb_pro_id = pro_id";
					$sr=1;
					$data=mysqli_query($con,$qs) or die(mysqli_error($con));
					while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
					{
					?>
						<tr>
						<td><?php echo $sr++; ?></td>
						<td><?php echo $row['alb_name']; ?></td>
						<td><?php echo $row['alb_release_date']; ?></td>
						<td><?php echo $row['cat_name']; ?></td>
						<td><?php echo $row['pro_name']; ?></td>
						<td><img src="upload/<?php echo $row['alb_poster']; ?>" style="width:50px;height:50px;"></td>
						<td><a onclick="return confirm('Are you sure to DELETE this item?')" href="album.php?id=<?php echo $row['alb_id']; ?>">DELETE </a> </td>
						
						<td><a href="album.php?eid=<?php echo $row['alb_id']; ?>">EDIT </a> </td>
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