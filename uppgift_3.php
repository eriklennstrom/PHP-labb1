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
<?php
	$firstDate = "2017-08-01";
	$lastDate = "2017-08-31";
	$message = '';
	if(isset($_GET['submit'])) {
		$startDate = $_GET['startDate'];
		$endDate = $_GET['endDate'];
		$diffSeconds = strtotime($endDate) - strtotime($startDate);
		$diffMin = $diffSeconds / 60 ;
		$diffDays = date('d', $diffSeconds) - 1;
		if($startDate >= $endDate) {
			$message = '<br />End date need to be later than start date<br />';
		} else {
			$message = "Det är $diffDays dagar mellan $startDate och $endDate.<br />Det är $diffMin minuter mellan $startDate och $endDate. <br /> Det är $diffSeconds sekunder mellan $startDate och $endDate. <br /> ";
		}
	}

?>
<body>
	<form method="get" action="uppgift_3.php">
		<label>Start date</label>
		<select name="startDate">
		<?php
			for($i = $firstDate; $i <= $lastDate; $i++) {
				echo '<option value="' . $i . '">' . $i . '</option>';
			}
		?>
		</select>
		<label>End date</label>
		<select name="endDate">
		<?php
			for($i = $firstDate; $i <= $lastDate; $i++) {
				echo '<option value="' . $i . '">' . $i . '</option>';
			}
		?>
		</select>
		<br />
		<button type="submit" name="submit">Skicka</button>
	</form>
	<?php echo $message; ?>
</body>
</html>
