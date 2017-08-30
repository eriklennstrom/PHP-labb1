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

session_start();
define("SESSIONKEY", "textarea");

$textArea = (isset($_POST['textinput'])) ? $_POST['textinput'] : false;

// If submitted
if (isset($_POST['submit'])) {
    if(isset($_POST['destroy']) && $_POST['destroy'] = "destroySession"){
        unset($_SESSION[SESSIONKEY]);
    }else{
        $_SESSION[SESSIONKEY] = $textArea;
    }
}
?>

<form action="uppgift_4.php" method="post">
    <textarea name="textinput" placeholder="Type text here" style="height: 50rem; width: 90%;"><?php if(isset($_SESSION[SESSIONKEY])) echo $_SESSION[SESSIONKEY]?></textarea><br>
    <label for="destroy">Delete session</label>
    <input type="radio" id="destroy" name="destroy" value="destroySession"><br>
    <input type="submit" name="submit" value="Skicka in">
</form>


</body>
</html>