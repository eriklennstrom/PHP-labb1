<!DOCTYPE html>
<html lang="sv">
<head>

    <title>Labb 1_0 - Formulär - Mall</title>
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
<body>


<?php

$firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : false;
$surname = (isset($_POST['surname'])) ? $_POST['surname'] : false;
$tel = (isset($_POST['tel'])) ? $_POST['tel'] : false;
$email = (isset($_POST['email'])) ? $_POST['email'] : false;
$password = (isset($_POST['password'])) ? $_POST['password'] : false;
$passwordConfirm = (isset($_POST['passwordConfirm'])) ? $_POST['passwordConfirm'] : false;

$valid = true;

// If submitted
if (isset($_POST['submit'])) {

    //If any field is missing
    if (!$firstname || !$surname || !$tel || !$email || !$password || !$passwordConfirm) {
        $valid = false;
        echo '<h3>Fält saknas!</h3>';
        echo '<ul>';
            if (!$firstname) echo '<li>Firstname</li>';
            if (!$surname) echo '<li>Surname</li>';
            if (!$tel) echo '<li>Telephone</li>';
            if (!$email) echo '<li>Email</li>';
            if (!$password) echo '<li>Password</li>';
            if (!$passwordConfirm) echo '<li>Password confirmation</li>';
        echo '</ul>';
    }

    //If we have validation issue
    if(strlen($firstname) < 3 || strlen($surname) < 3 || strlen($tel) < 5 || !filter_var($email, FILTER_VALIDATE_EMAIL) || $password != $passwordConfirm){
        $valid = false;
        echo '<h3> Wrong formats: </h3>';
        echo '<ul>';
        if(strlen($firstname) < 3) echo '<li>Firstname min length 3 char</li>';
        if(strlen($surname) < 3) echo '<li>Surname min length 3 char</li>';
        if(strlen($tel) < 5) echo '<li>Telephone not long enough, min 5 char</li>';
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) echo '<li>Email format wrong</li>';
        if($password != $passwordConfirm) echo "<li>Passwords don't match</li>";
        echo '</ul>';
    }

    if($valid) echo 'Tack ' . $surname;


}
?>

<form action="uppgift_2.php" method="post">
    <input type="text" name="firstname" placeholder="Förnamn" class="<?php echo ($firstname && strlen($firstname) >= 3) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="text" name="surname" placeholder="Efternamn" class="<?php echo ($surname && strlen($surname) >= 3) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="email" name="email" placeholder="Email" class="<?php echo ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="tel" name="tel" placeholder="Telephone" class="<?php echo ($tel && strlen($tel) >= 5) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="password" name="password" placeholder="Password" class="<?php echo ($password && $password == $passwordConfirm) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="password" name="passwordConfirm" placeholder="Password confirmation" class="<?php echo ($passwordConfirm && $password == $passwordConfirm) ? 'form-valid' : 'form-error'; ?>"><br>

    <input type="submit" name="submit" value="Skicka in">
</form>


</body>
</html>