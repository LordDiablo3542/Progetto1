<!DOCTYPE html>
<html>
<head>
	<title>Espoprofessioni</title>
	<style type="text/css">
		body {
			margin: 0px;
			font-family: "Arial", sens-serif;
		}
		table {
			margin-left: 10%;
			padding-bottom: 15px;
		}
		th {
			text-align: right;
			padding-right: 15px;
		}
		td {
			padding-left: 15px;
		}
		div{
			background-color: DodgerBlue;
			height: 100px;
			margin: 0px;
		}
		th,td {
			padding-top: 20px;
		}
		#bottom {
			text-align: center;
		}
		.error {
			color: red;
		}
	</style>
</head>
<body>
	<?php
		$nome = $cognome = $sesso = $dnascita = $email = $via = $citta = $cap = $nazionalita = "";
		$textErr = $nomeErr = $cognomeErr = $dnascitaErr = $emailErr = $viaErr = $cittaErr = $capErr = $nazionalitaErr ="";
		$err = $false;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["nome"])) {
				$nomeErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$nome = test_input($_POST["nome"]);
			}
			 
			if (empty($_POST["cognome"])) {
				$cognomeErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$cognome = test_input($_POST["cognome"]);
			}
			  
			$sesso = test_input($_POST["sesso"]);

			if (empty($_POST["dnascita"])) {
				$dnascitaErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$dnascita = test_input($_POST["dnascita"]);
			}

			if (empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$emailErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$email = test_input($_POST["email"]);
			}

			if (empty($_POST["nazionalita"])) {
				$nazionalitaErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$nazionalita = test_input($_POST["nazionalita"]);
			}

			if (empty($_POST["via"])) {
				$viaErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$via = test_input($_POST["via"]);
			}

			if (empty($_POST["citta"])) {
				$cittaErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$citta = test_input($_POST["citta"]);
			}

			if (empty($_POST["cap"])) {
				$capErr = "*";
				$textErr = "* Campi mancanti o errati";
				$err = $true;
			} else {
				$cap = test_input($_POST["cap"]);
			}

			if(!$err){
				$text = "$nome;$cognome;$sesso;$dnascita;$email;$via;$citta;$cap;$nazionalita";
			}
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	<div>
	</div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	
		<table style="width: 90%;">
			<tr>
				<td></td>
				<td>
					<span class="error"><?php echo $textErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					Nome :
				</th>
				<td>
					<input type="text" name="nome" value="<?php echo $nome?>">
					<span class="error"><?php echo $nomeErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					Cognome :
				</th>
				<td>
					<input type="text" name="cognome" value="<?php echo $cognome?>">
					<span class="error"><?php echo $cognomeErr;?></span>
				</td>
			</tr>
			<tr>
				<th valign="top">
					Sesso :
				</th>
				<td>
					<input type="radio" name="sesso" value="M" checked> Maschio
					<br>
					<input type="radio" name="sesso" value="F"> 
					Femmina
				</td>
			</tr>
			<tr>
				<th>
					 Data di nascita :
				</th>
				<td>
					<input type="date" name="dnascita" value="<?php echo $dnascita?>">
					<span class="error"><?php echo $dnascitaErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					 E-mail :
				</th>
				<td>
					<input type="text" name="email" value="<?php echo $email?>">
					<span class="error"><?php echo $emailErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					 Nazionalità :
				</th>
				<td>
					<input type="text" name="nazionalita" value="<?php echo $nazionalita?>" >
					<span class="error"><?php echo $nazionalitaErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					Via :
				</th>
				<td>
					<input type="text" name="via" value="<?php echo $via?>">
					<span class="error"><?php echo $viaErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					Città :
				</th>
				<td>
					<input type="text" name="citta" value="<?php echo $citta?>">
					<span class="error"><?php echo $cittaErr;?></span>
				</td>
			</tr>
			<tr>
				<th>
					CAP :
				</th>
				<td>
					<input type="text" name="cap" value="<?php echo $cap?>">
					<span class="error"><?php echo $capErr;?></span>
				</td>
			</tr>
			<tr>
				<th valign="top">
					Osservazione :
				</th>
				<td>
					<textarea name="osservazione"></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Invia">  
				</td>
			</tr>
		</table>
	</form>
	<div id="bottom">
		<br>
		&copy elia.manassero
	</div>
</body>
</html>