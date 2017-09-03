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
// Deklarera ett användarnamn och lösenord som varsin konstant
define('ALLOWED_EMAIL', 'test@123.com');
define('ALLOWED_PASSWORD', 'kappa');
define('USER_COOKIE_KEY', 'user');


$email = (isset($_POST['email'])) ? $_POST['email'] : false;
$password = (isset($_POST['password'])) ? $_POST['password'] : false;
$logout = (isset($_POST['logout'])) ? $_POST['logout'] : false;
$userLoggedIn = false;
$decodedCookie = "";

if (isset($_COOKIE[USER_COOKIE_KEY])) {
    //Deserialize cookie if we have one, and set user online
    $decodedCookie = json_decode(base64_decode($_COOKIE[USER_COOKIE_KEY]));
    if (($decodedCookie->email == ALLOWED_EMAIL) && ($decodedCookie->password == ALLOWED_PASSWORD)) {
        $userLoggedIn = true;
    }
}


// If logged out
if ($logout) {
    //Expire cookie
    setcookie(USER_COOKIE_KEY, "", time() - 3600, "/");

    //Set user offline
    $userLoggedIn = false;

    echo '<h2>Loggade ut</h2>';
}

// If login
if (isset($_POST['submit']) && !$userLoggedIn && !$logout) {
    if ($password && $email) {
        if ($email == ALLOWED_EMAIL && $password == ALLOWED_PASSWORD) {

            //Serialise coookie
            $cokieInput = base64_encode(json_encode($_POST));

            //Create obj of array
            $decodedCookie = (object)$_POST;

            setcookie(USER_COOKIE_KEY, $cokieInput, time() + 60 * 60 * 24 * 365, "/");

            $userLoggedIn = true;

        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<h3>Wrong email format</h3>';
            } else {
                echo '<h2>Wrong email or password.</h2>';

            }
        }
    } else {
        echo '<h2>Fields are missing</h2>';
    }
}
?>



<?php if (!$userLoggedIn) : ?>
    <form action="uppgift_6.php" method="post">
        <input id="email" type="email" name="email" placeholder="Email">
        <label for="password"></label>
        <input id="password" type="password" name="password">
        <input type="submit" name="submit" value="Skicka in">
    </form>

<?php else : ?>
    <h6>Du är nu inloggad med epost: <?php echo $decodedCookie->email ?> , där <?php echo $decodedCookie->email ?> är
        den epost man loggade in med.</h6>

    <form action="uppgift_6.php" method="post">
        <input type="submit" name="logout" value="Logga ut">
    </form>

<?php endif; ?>
</body>
</html>