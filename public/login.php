<!DOCTYTPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Forms my PhP</title>
</head>
<body>
	<table>
		<tr>
			<td>
				<h1>GET</h1>
				<?php var_dump($_GET); ?>
			</td>
			<td>
				<h1>(o___~___o)</h1>
			</td>
			<td>
				<h1>POST</h1>
				<?php var_dump($_POST); ?>
			</td>
		</tr>
	</table>
	<hr>

	<div id="search">
		<h2> Search &nbsp; ME stuff</h2>
		<form method='GET' action='/login.php'>
			<p>
				<label for='search'>Search</label>
				<input id='search' name='search' type='text' placeholder="search yo' self">
				<button type='submit'>Go Forth</button>
			</p>
		</form>
	</div>
	<hr>

	<div id="login">
		<h2>Log In</h2>
		<form method='POST' action='/login.php'>
			<p>
				<label for='username'>Username</label>
				<input id='username' name='username' type='text' placeholder='use-err-name'>
			</p>
			<p>
				<label for='password'>Password</label>
				<input id='password' name='password' type='password' placeholder='shhhhhh'>
			</p>
			<p>
				<input type='submit' value='Send your GET request'>
			</p>
		</form>
	</div>
	<hr>

	<div id="signup">
		<h2>Sign Up</h2>
		<form method='POST' action='/login.php'>
			<p>
				<label for='alias_name'>submit alias</label><br>
				<input id='alias_name' name='alias_name' type='text' placeholder='submit, do it!' autofocus>
			</p>
			<p>
				<label for='password_new'>try &amp; guess our password conventions before we tell you; after you get it wrong!</label><br>
				<input for='password_new' name='password_new' type='password' placeholder='muahahaha'>
			</p>
			<p>
				<button type='submit'><img src='/img/dontPanic.jpg'></button>
			</p>
		</form>
	</div>
	<hr>

	<div id="email">
		<h2>Contact Me</h2>
		<form method='POST' action='/login.php'>
			<p>
				<label for='email'>From:</label>
				<input id='email' name='email' type='text' placeholder='Enter Your Email, pls'>
			</p>
			<p>
				<label for='email_body'>What ya want</label><br>
				<textarea id='email_body' name='email_body'></textarea>
			</p>
			<p>
				<label><input type='checkbox' checked='yes'>Save a copy to your sent folder?</label>
				<input type='submit' value='whoosh---->'>
			</p>
		</form>
	</div>
	<hr>

</body>
</html>