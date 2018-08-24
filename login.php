<?php
if(!isset($_SESSION))
{
	session_start(); 
}
if(isset($_POST["login"]))
{	

	$username=$_POST["uname"];
	$password=$_POST["psw"];
	
	$dbuser = "aagrahar"; 
	$dbpass = "tU45w.S)"; 
	$db = "SSID";
	$connect = OCILogon($dbuser, $dbpass, $db);
	if (!$connect)
	{
	echo "An error occurred connecting to the database";
	exit;
	}
	
	$query = "SELECT * FROM Login WHERE USERNAME='$username' AND PASSWORD='$password'";
	
	$stmt = OCIParse($connect, $query);
	if(!$stmt)
	{
	echo "An error occurred in parsing the SQL string.\n";
	exit;
	}
	OCIExecute($stmt);
	$login_array=oci_fetch_assoc($stmt);
	$count=OCI_NUM_ROWS($stmt);
	
	OCILogOff ($connect);
	if($count==1)
	{
		$usertype = $login_array["USERTYPE"];
		$_SESSION["privilege"]=$usertype;
		header("location:user_welcome.php");
	}
	else
	{
		echo '<script>alert("Entered Username or Password is incorrect.");
		window.location.href="index.php";</script>';		
	}
	
}
else
{
	header("location:index.php");
}
?>
