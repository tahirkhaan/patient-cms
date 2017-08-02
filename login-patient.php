<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Patient</title>
  	<link rel="stylesheet" href="css/style.css">
</head>

<body>
  	
<div class="box">
<form action="#" method="post">
  <h2>Patient Login</h2>
		<p>
			<label for="patientid" class="floatLabel">Patient ID</label>
			<input id="patientid" name="patientid" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<input type="submit" value="Login" id="submit">
		</p>
	</form>
	</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
