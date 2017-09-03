<?php
	spl_autoload_register(function($class){
		require 'modules/' . $class . '.php';
	})
?>
<!DOCTYPE html>
<html lang="sv">
<head>

    <title>Labb 1_0 - Uppgift 5</title>
    <meta charset="utf-8">

    <!-- Skriv er grupp och namn som meta-taggar här -->
    <meta group="Grupp 1">
    <meta author="Isak Larsson / Erik Lennström">

    <style>

        body {
            font-family: Sans-Serif;
        }

        fieldset {
            border: 2px solid #CCC;
            border-radius: 10px;
        }

        .form-valid {
            border: 2px solid greenyellow;
        }

        .form-error {
            border: 2px solid red;
        }

    </style>

</head>
<?php
	if(isset($_POST['submit'])){
		$form = new Form([
			new TextField('firstname'),
			new TextField('surname'),
			new EmailField('email'),
			new PhoneField('tel'),
			(new PasswordField('password'))->confirmation('passwordConfirm')
		]);
		//var_dump($form);
		$form->validate();
		//var_dump($form->errors[0]);
	}
 ?>
<body>
	<h3>Fält saknas</h3>
	<ul>
		<?php
		for ($i = 0; $i < count($form->errors); $i++)  {
			//var_dump();
			echo '<li>Fältet ' . $form->errors[$i]['name'] . ' är fel. Meddelande: ' . $form->errors[$i]['message'] . '</li>';
		}
		?>
	</ul>
	<form action="index.php" method="post">
	    <input type="text" name="firstname" placeholder="Förnamn" class="<?php echo (!in_array('firstname', $form->errors) && !isset($_POST['submit'])) ? 'form-valid' : 'form-error'; ?>"><br>
	    <input type="text" name="surname" placeholder="Efternamn" class="<?php echo (!in_array('surname', $form->errors)) ? 'form-valid' : 'form-error'; ?>"><br>
	    <input type="email" name="email" placeholder="Email" class="<?php echo (!in_array('email', $form->errors)) ? 'form-valid' : 'form-error'; ?>"><br>
	    <input type="tel" name="tel" placeholder="Telephone" class="<?php echo (!in_array('tel', $form->errors)) ? 'form-valid' : 'form-error'; ?>"><br>
	    <input type="password" name="password" placeholder="Password" class="<?php echo (!in_array('password', $form->errors)) ? 'form-valid' : 'form-error'; ?>"><br>
	    <input type="password" name="passwordConfirm" placeholder="Password confirmation" class="<?php echo (!in_array('password', $form->errors)) ? 'form-valid' : 'form-error'; ?>"><br>
	    <input type="submit" name="submit" value="Skicka in">
	</form>
</body>
</html>
