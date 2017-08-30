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
$age = (isset($_POST['age'])) ? $_POST['age'] : false;
$amount = (isset($_POST['amount'])) ? $_POST['amount'] : false;

// If submitted
if (isset($_POST['submit'])) {

    //If any field is missing
    if (!$firstname || !$surname || !$tel || !$age || !$amount) {
        echo '<h3>Fyll i alla fält!</h3>';
        echo '<ul>';
        if (!$firstname) echo '<li>Firstname</li>';
        if (!$surname) echo '<li>Surname</li>';
        if (!$tel) echo '<li>Telephone</li>';
        if (!$age) echo '<li>Age</li>';
        if (!$amount) echo '<li>Amount</li>';
        echo '</ul>';
    } else {
        echo '<h1>Tack ' . $firstname . '</h1>';
    }
}
?>

<form action="uppgift_1.php" method="post">
    <input type="text" name="firstname" placeholder="Förnamn"
           class="<?php echo ($firstname) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="text" name="surname" placeholder="Efternamn"
           class="<?php echo ($surname) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="tel" name="tel" placeholder="Telephone"
           class="<?php echo ($tel) ? 'form-valid' : 'form-error'; ?>"><br>
    <input type="number" name="age" placeholder="Age" class="<?php echo ($age) ? 'form-valid' : 'form-error'; ?>"><br>
    <select name="amount" class="<?php echo ($amount) ? 'form-valid' : 'form-error'; ?>">
        <?php
        for ($count = 1; $count < 11; $count++) {
            echo '<option value=" ' . $count . ' ">' . $count . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Skicka in">
</form>


</body>
</html>