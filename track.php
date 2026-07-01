<?php
session_start();
if(!isset($_SESSION['user_name']))
{
	header('location:index.php');
}
include('inc/config.php');
    $Tr_title="";
	$Tr_alb_id="";
	$Tr_art_id="";
	$Tr_duration="";
	$Tr_rating="";
	$Tr_id="";
if(isset($_POST['save']))
{
	$Tr_title=$_POST['Tr_title'];
	$Tr_art_id=$_POST['Tr_art_id'];
	$Tr_alb_id=$_POST['Tr_alb_id'];
	$Tr_duration=$_POST['Tr_duration'];
	$Tr_rating=$_POST['Tr_rating'];
	
	$Tr_poster=$_FILES['Tr_poster']['name'];
	
	move_uploaded_file($_FILES['Tr_poster']['tmp_name'],"upload/".$Tr_poster);
	 $qs="insert into track(Tr_title,Tr_alb_id,Tr_art_id,Tr_duration,Tr_rating,Tr_poster)values('$Tr_title','$Tr_alb_id','$Tr_art_id','$Tr_duration','$Tr_rating','$Tr_poster')";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_POST['update']))
{
	$Tr_title=$_POST['Tr_title'];
	$Tr_art_id=$_POST['Tr_art_id'];
	$Tr_alb_id=$_POST['Tr_alb_id'];
	$Tr_duration=$_POST['Tr_duration'];
	$Tr_rating=$_POST['Tr_rating'];
	$Tr_id=$_POST['Tr_id'];
	
	$Tr_poster=$_FILES['Tr_poster']['name'];
	
	move_uploaded_file($_FILES['Tr_poster']['tmp_name'],"upload/".$Tr_poster);
	$qs="update track set Tr_title= '$Tr_title',Tr_art_id='$Tr_art_id',Tr_alb_id='$Tr_alb_id',Tr_duration='$Tr_duration',Tr_rating='$Tr_rating',Tr_poster='$Tr_poster' where Tr_id='$Tr_id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$qs="delete from track where Tr_id='$id'";
	mysqli_query($con,$qs) or die(mysqli_error($con));
	
}
if(isset($_GET['eid']))
{
	$id=$_GET['eid'];
	$qs="select* from track where Tr_id='$id'";
	$data=mysqli_query($con,$qs) or die(mysqli_error($con));
	$row=mysqli_fetch_array($data,MYSQLI_BOTH);
	$Tr_title=$row['Tr_title'];
	$Tr_alb_id=$row['Tr_alb_id'];
	$Tr_art_id=$row['Tr_art_id'];
	$Tr_duration=$row['Tr_duration'];
	$Tr_rating=$row['Tr_rating'];
	$Tr_id=$row['Tr_id'];
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
			    <table  class="b1">
						<tr>
							<th colspan="4">TRACK</th>
						</tr>
						<tr>
							<td>Track-Title</td>
							<td><input type="text" name="Tr_title" value="<?php echo $Tr_title; ?>"/>
								<input type="hidden" name="Tr_id" value="<?php echo $Tr_id; ?>"/>
							</td>
							<td>Album</td>
							<td><select name="Tr_alb_id">
									<option value="">Select Any One</option>
									<?php
									$qs="select * from album order by alb_name";
									$data=mysqli_query($con,$qs) or die(mysqli_error($con));
									while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
									{
										if($Tr_alb_id==$row['alb_id'])
										{
											echo "<option value='".$row['alb_id']."'selected>".$row['alb_name']."</option>";
										}
										else
										{
											echo "<option value='".$row['alb_id']."'>".$row['alb_name']."</option>";
										}
									}
									?>
								</select>
								
							</td>
						</tr>
						<tr>
							<td>Artist</th>
							<td><select name="Tr_art_id">
									<option value="">Select Any One</option>
									<?php
									$qs="select * from artist order by art_name";
									$data=mysqli_query($con,$qs) or die(mysqli_error($con));
									while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
									{
										if($Tr_art_id==$row['art_id'])
										{
											echo "<option value='".$row['art_id']."'selected>".$row['art_name']."</option>";
										}
										else
										{
											echo "<option value='".$row['art_id']."'>".$row['art_name']."</option>";
										}
									}
									?>
								</select>
								
							</td>
							<td>Track-Duration</td>
							<td><input type="numeric" name="Tr_duration" value="<?php echo $Tr_duration; ?>"/>
								
							</td>
						</tr>
						<tr>
							
							<td>Track-Rating</td>
							<td><input type="numeric" name="Tr_rating" value="<?php echo $Tr_rating; ?>"/>
								
							</td>
						</tr>
						<tr>
							<td>Upload Poster</td>
							<td><input name="Tr_poster" type="file"></td>
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
						<th>Track Title</th>
						<th>Album</th>
						<th>Artist</th>
						<th>Track Duration</th>
						<th>Track Rating</th>
						<th>Poster</th>
						<th colspan="2">Action</th>
					</tr>
					
					
				<?php
					$qs="select * from track inner join artist on Tr_art_id=art_id inner join album on alb_id=Tr_alb_id";
					$sr=1;
					$data=mysqli_query($con,$qs) or die(mysqli_error($con));
					while($row=mysqli_fetch_array($data,MYSQLI_BOTH))
					{
					?>
						<tr>
						<td><?php echo $sr++; ?></td>
						<td><?php echo $row['Tr_title']; ?></td>
						<td><?php echo $row['alb_name']; ?></td>
						<td><?php echo $row['art_name']; ?></td>
						<td><?php echo $row['Tr_duration']; ?></td>
						<td><?php echo $row['Tr_rating']; ?></td>
						<td><img src="upload/<?php echo $row['Tr_poster']; ?>" style="width:50px;height:50px;"></td>
						<td><a onclick="return confirm('Are you sure to DELETE this item?')" href="track.php?id=<?php echo $row['Tr_id']; ?>">DELETE </a></td>
						<td><a href="track.php?eid=<?php echo $row['Tr_id']; ?>">EDIT </a></td>
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