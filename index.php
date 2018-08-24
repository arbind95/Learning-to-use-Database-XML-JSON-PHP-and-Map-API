<?php
if(!isset($_SESSION))
{
	session_start(); 
}
if(!isset($_SESSION["privilege"]))
{
?>
 <html>
	 <head>
		<link rel="stylesheet" type="text/css" href="main.css">
		<script type="text/javascript">
         function generateCaptcha()
         {
             var alpha = new Array('1','2','3','4','5','6','7','8','9','0','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
             var i;
             for (i=0;i<4;i++){
               var a = alpha[Math.floor(Math.random() * alpha.length)];
               var b = alpha[Math.floor(Math.random() * alpha.length)];
               var c = alpha[Math.floor(Math.random() * alpha.length)];
               var d = alpha[Math.floor(Math.random() * alpha.length)];
              }
            var code = a + '' + b + '' + '' + c + '' + d;
            document.getElementById("mainCaptcha").value = code
          }
          function CheckValidCaptcha(){
              var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
              var string2 = removeSpaces(document.getElementById('captchainput').value);
              if (string1 == string2){
				//alert("Form is validated Successfully");
				document.getElementById("login").disabled = false;
         //alert("Form is validated Successfully");
                return true;
              }
              else{
         alert("Please enter a valid captcha.");
         //alert("Please enter a valid captcha.");
		 document.getElementById("login").disabled = true;
                return false;

              }
          }
          function removeSpaces(string){
            return string.split(' ').join('');
          }
      </script>
	</head>
	<body onload="generateCaptcha();">
		<form method="post" action="login.php" id="loginform">
		<div class="imgcontainer">
			<img src="login.jpg" alt="Avatar" class="avatar">
		</div>

		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>
			<label for="uname"><b>Captcha:</b></label>
			<input type="text" id="mainCaptcha" readonly="readonly"/>
            		<input type="button" id="refresh" value="Refresh" onclick="generateCaptcha();" />
			<input type="text" placeholder="Enter Captcha" name="captcha" id="captchainput" onblur="CheckValidCaptcha();" required>
			
			<button type="submit" name="login" id="login">Login</button>
			

		</div>
		<div>
			<p style="color:blue; font-size:20px;" align="center">Use Username: guest and Password: SIT780 to login.</p>
		</div>

		</form>
	</body>
</html>
<?php
}
else
{
	header("location:user_welcome.php");
}
?>
