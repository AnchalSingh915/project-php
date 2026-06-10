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
			<form>
				<table>
					<tr>
						<th colspan="2">LOGIN</th>
					</tr>
					<tr>
						<td>Username</td>
					    <td><input type="email" name="email"></td>
					</tr>
					<tr>
						<td>Password</td>
					    <td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td></td>
					    <td id="login"><input type="submit" value="Login"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>