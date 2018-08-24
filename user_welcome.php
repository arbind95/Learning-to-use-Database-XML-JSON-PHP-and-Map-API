<?php
if(!isset($_SESSION)){
	session_start(); 
}
if(isset($_SESSION["privilege"]))
{
	$login_user_privilege=$_SESSION["privilege"];
?>
<html>
<head>
	<title>WelCome</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	
</head>
<body>
	<table style="width:100%; margin-top:50px; border:none;">
		<tr>
			<td style="width:30%;">
			
				<table style="width:100%; border:none;">
					<tr><td><a href="user_welcome.php" style="color:white; font-size:25px; text-decoration: none;">Home</a></td></tr>
					<tr><td><a href="user_welcome.php?body=viewstudent.php" style="color:white; font-size:25px; text-decoration: none;">View Student Data</a></td></tr>
					<tr><td><a href="user_welcome.php?body=searchstudent.php" style="color:white; font-size:25px; text-decoration: none;">Search Student Data</a></td></tr>
					<tr><td><a href="user_welcome.php?body=sensor.php" style="color:white; font-size:25px; text-decoration: none;">Sensor Data</a></td></tr>
					
					<?php
						if($login_user_privilege=="admin")
						{
							?>
							<tr><td><a href="user_welcome.php?body=addstudent.php" style="color:white; font-size:25px; text-decoration: none;">Add New Student</a></td></tr>
							<?php
						}
					?>
					<tr><td><a href="logout.php" style="color:white; font-size:25px; text-decoration: none;">Logout</a></td></tr>
				</table>			
			</td>		
			<td style="width:70%;">
			
				<?php
					if(isset($_GET["body"]))
					{
						include($_GET["body"]);
					}
					else
					{

						
						if($login_user_privilege=="admin")
						{
							echo '<h1>Welcome Admin</h1>';
							
						}
						else
						{
							echo '<h1>Welcome Guest</h1>';
							
						}

						
						echo '<img src="students.jpg" width="80%" height="400px">';					
					}
				?>
			</td>	
		</tr>
	</table>
</body>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>