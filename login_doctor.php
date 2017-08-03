<?php include "header.php"; ?>

<body>
  	
<div class="box">
<form action="#" method="post">
  <h2>Doctor Login</h2>
		<p>
			<label for="doctorid" class="floatLabel">Doctor ID</label>
			<input id="doctorid" name="doctorid" type="text">
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
	
<?php include "footer.php"; ?>	