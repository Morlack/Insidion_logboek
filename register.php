<html>
<head>
	<title>Logboek D.M.C</title>
</head>
<body>

<?php
session_start();
require_once(dirname(__file__) .  '/lib/user.php');

if(isset($_POST['email'])) {
	if($_POST['passphrase'] != 'koekjes') 
	{
		echo "The passphrase you entered was incorrect. Please contact the administrator";
		exit;
	}
	if(create_user($_POST['name'], $_POST['email'], $_POST['password']))
	{
		authenticate($_POST['email'], $_POST['password']);
		header('location: logboek.php');
	}
	else {
		echo "You didn't fill in all the fields correctly. Please try again:<br/><br/>";
		showRegisterForm();
	}
} else showRegisterForm();

function showRegisterForm()
{
	?>
	<form method='POST'>
		<label for='name'> Naam: </label>
		<input type='text' name='name' id='name'><br/>
		<label for='email'> Email: </label>
		<input type='text' name='email' id='email'><br/>
		<label for='password'> Wachtwoord: </label>
		<input type='password' name='password' id='password'><br/>
		<label for='passphrase'>Passphrase:</label>
		<input type='text' name='passphrase' id='passphrase'><br/>
		Note: you got the passphrase for joining from your admin!<br/>
		<input type='submit'>Register!</submit>
	</form>
	<?php
}

?>
</body>
</html>