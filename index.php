<?php
session_start();
$uname=$pass="";
if(isset($_POST['login']))
{
	extract($_POST);
	include('inc/config.php');
	$qs="select * from user where user_email='$email' and user_password='$password'";
	$data=mysqli_query($con,$qs) or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0)
	{
		$row=mysqli_fetch_array($data,MYSQLI_BOTH);
		$_SESSION['user_name']=$row['user_name'];
		if(isset($_POST['rem']))
		{
			setcookie('user_name',$email, time() +86400);
			setcookie('user_pass',$password, time() +86400);
		}		
		header('location:dashboard.php');
	}
	else
	{
		echo "Invalid Useer ID or password";
	}
}

if(isset($_COOKIE['user_name']))
{
	$uname=$_COOKIE['user_name'];
	$pass=$_COOKIE['user_pass'];
}
?>

<!doctype html>
<html>
	<head>
		 <style>
		    body{
				background-image: url('images/img1.jpg');
				background-size:cover;
				background-repeat:no-repeat;
				background-attachment:fixed;
			}

			.box{ 
			  height:150px;
			  width:300px;
              color:white;
			  margin:auto;
			  margin-top:150px;
			  padding:20px;
			  border-radius:20px 0px 20px 0px;
			  background-color:darkblue;
			  box-shadow:10px 10px 10px white;
			}
			th{
				font-size:35px;
			}
			td{
				font-size:20px;
			}
			#login input{
				height:35px;
				width:130px;
				font-size:25px;
			}
			#login{
				height:70px;
			}
		 </style>
	<head>
	<body>
		<div class="box">
			<form method="post">
				<ta1ble>
					<tr>
						<th colspan="2">LOGIN</th>
					</tr>
					<tr>
						<td>Username</td>
					    <td><input type="email" name="email" value="<?php echo $uname; ?>"></td>
					</tr>
					<tr>
						<td>Password</td>
					    <td><input type="password" name="password" value="<?php echo $pass; ?>"></td>
					</tr>
					<tr>
						<td></td>
					    <td><input type="checkbox" name="rem"> Remember me</td>
					</tr>
					
					<tr>
						<td></td>
					    <td id="login"><input type="submit" name="login" value="Login"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>