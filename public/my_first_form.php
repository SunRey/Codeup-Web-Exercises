<?php
	var_dump($_GET);
	var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>My First HTML Form</title>
</head>
<body>
	<div id="login">
		<form method='POST' action='/my_first_form.php'>
			<p>
				<label for='username'>Username</label>
				<input id='username' name='username' type='text' placeholder='username' autofocus>
			</p>
			<p>
				<label for='password'>Password</label>
				<input id='password' name='password' type='password' placeholder='password'>
			</p>
			<p>
				<button type='submit' name='Login'>Log me in</button>
				<input type='submit' value="Don't Press">
			</p>
		</form>
	</div>

	<hr>
	<button><a href='/login.php' target='_blank'>php All over it</a></button>
	<hr>

	<div id="email">
		<form method='POST' action='/my_first_form.php'>
			<h2>COMPOSE e-Mail</h2>
			<p>
				<label for='to_email'>Their Email:</label>
				<input id="to_email" name='to_email' type='text' placeholder='them@us.com'>
			</p>
			<p>
				<label for='user_email'>Your Email:</label>
				<input id="user_email" name='user_email' type='text' placeholder='you@me.com'>
			</p>
			<p>
				<label for='subject'>Subject:</label>
				<input id="subject" name='subject' type='text' placeholder='subjective'>
			</p>
			<p>
				<label for='body'>Dat Body:</label><br>
				<textarea id='body' name='body' placeholder='Speak your mind'></textarea>
			</p>
			<p>
				<button type='submit'>SEND</button><br>
				<label for='did_you_check'><input id='did_you_check' name='did_you_check' type='checkbox' checked='yes'>Save a copy to your sent folder?</label>
			</p>
		</form>
	</div>
	<hr>

	<div id="multi_choice">
		<h2>Multiple Choices</h2>
		<form method='POST' action='/my_first_form.php'>
			<p>
				<label for='q1'>What is the answer to the universe?</label><br>
				<label><input type='radio' name="q1" value='true'>true</label><br>
				<label><input type='radio' name="q1" value='flase'>flase</label><br>
				<label><input type='radio' name="q1" value='IDK'>I dont know</label><br>
				<label><input type='radio' name="q1" value='42'>42</label>
			</p>

			<p>
				<label for='q2'>Did you read this question?</label><br>
				<label><input type='radio' name="q2" value='true'>true</label><br>
				<label><input type='radio' name="q2" value='flase'>flase</label><br>
				<label><input type='radio' name="q2" value='IDK'>I dont know</label><br>
				<label><input type='radio' name="q2" value='42'>42</label>
			</p>
			<button type='submit'>Are you sure?</button>
		</form>
	</div>
	<hr>

	<div id="lists">
		<form method='POST' action='/my_first_form.php'>
			<label for='first_question'>Is this your first time with a select box?</label>
			<select id='first_question' name='first_question'>
				<option selected value='1'>Yes</option>
				<option value'0'>No</option>
			</select><br>
			<br>
			<label for='second_question'>Bubble gum in a dish; how many pieces do you wish?</label><br>
			<select id='second_question' name='second_question[]' multiple>
				<option value='0' disabled selected>Select 1 or many:</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
			</select><br>
			<input type='submit' value='Your Move'>
		</form>
	</div>
</body>
</html>
