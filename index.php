<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet/less" href="style.less">
	<script src="less.js"></script>
	<script language=JavaScript>
	<!--

	function InputCheck(RegForm)
	{
	  if (RegForm.uname.value == "")
	  {
	    alert("user name cannot blank!");
	    RegForm.uname.focus();
	    return (false);
	  }
	  if (RegForm.pw.value == "")
	  {
	    alert("Please set password!");
	    RegForm.pw.focus();
	    return (false);
	  }
	  if (RegForm.repass.value != RegForm.pw.value)
	  {
	    alert("Two passwords does not match!");
	    RegForm.repass.focus();
	    return (false);
	  }
	  if (RegForm.email.value == "")
	  {
	    alert("Email cannot be blank!");
	    RegForm.email.focus();
	    return (false);
	  }
	}

	//-->
	</script>
</head>
<body>
	<header>
		<div class = "wrapper">
			<form name="LoginForm" method="post" action="home.php" onSubmit="return InputCheck(this)">
				Already a member? Sign in:
				<input id="uname" name="uname" type="text" class="input" />
				<input id="pw" name="pw" type="password" class="input" />
				<input type="submit" name="login" value="Sign in" class="left" />
			</form>
		</div>
	</header>
	<div id="content">
		<div class="wrapper">
			<img src="gfx/chairs.jpg">
			<div class="panel right">
				<h1>New to Our Site? Sign up Here:</h1>
				<p>
					<form name="RegForm" method="post" action="signup.php" onSubmit="return InputCheck(this)">
						<p>
							<label for="uname" class="label">user name *:</label>
							<input id="uname" name="uname" type="text" class="input" />
						
							<label for="pw" class="label">password *:</label>
							<input id="pw" name="pw" type="password" class="input" />
						
							<label for="repass" class="label">password *:</label>
							<input id="repass" name="repass" type="password" class="input" />
						
							<label for="email" class="label">email *:</label>
							<input id="email" name="email" type="text" class="input" />
						<p/>
						<p>
							<input type="submit" name="submit" value="sign up" class="left" />
						</p>
					</form>
					
				</p>
			</div>
		</div>
	</div>
</body>
</html>
