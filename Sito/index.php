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
			padding-bottom: 15px;
			margin-left: 25%;
			width: 50%;
		}
		th {
			text-align: right;
			padding-right: 25px;
		}
		td {
			padding-left: 25px;
		}
		td,th{
			width: 25%;
		}
		div.title{
			background-color: DodgerBlue;
			height: 100px;
			margin: 0px;
		}
		th,td {
			padding-top: 20px;
		}
		#bottom {
			background-color: #000000;
			color: white;
			text-align: center;
			height: 100px;
			margin: 0px;
		}
		#minorenne {
			display: none;
		}
		#minorenne , x:-moz-any-link{
			display: block;
		}
		.subtitle {
			text-align: left;
			background-color: lightblue;
			padding-left: 15px;
			border-radius: 10px;
		}
	</style>
</head>
<body>

	<?php
		$oservazioni = $nome = $cognome = $sesso = $dnascita = $email = $via = $citta = $cap =$nazione = $nCellulare = $nTelefono = $cantone = $sedeUS = $annoUS = $denominazione = $tipo ="";

		$nomeP = $cognomeP = $ruolo = $emailP = $viaP = $cittaP = $capP = $cantoneP = $nazioneP = $nCellulareP = $nTelefonoP =  "-";

		$nazione = $nazioneP = $nazionalita = "Svizzera";
		$cantone = "Ticino";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nome = test_input($_POST["nome"]);
			$cognome = test_input($_POST["cognome"]);			  
			$sesso = test_input($_POST["sesso"]);
			$dnascita = test_input($_POST["dnascita"]);
			$email = test_input($_POST["email"]);
			$nazionalita = test_input($_POST["nazionalita"]);
			$via = test_input($_POST["via"]);
			$citta = test_input($_POST["citta"]);
			$cap = test_input($_POST["cap"]);
			$cantone = test_input($_POST["cantone"]);
			$nazione = test_input($_POST["nazione"]);
			$nCellulare = test_input($_POST["nCellulare"]);
			$nTelefono = test_input($_POST["nTelefono"]);
			$oservazioni = test_input($_POST["oservazioni"]);

			$nomeP = test_input($_POST["nomeP"]);
			$cognomeP = test_input($_POST["cognomeP"]);
			$ruolo = test_input($_POST["ruolo"]);
			$emailP = test_input($_POST["emailP"]);
			$viaP = test_input($_POST["viaP"]);
			$cittaP = test_input($_POST["cittaP"]);
			$capP = test_input($_POST["capP"]);
			$cantoneP = test_input($_POST["cantoneP"]);
			$nazioneP = test_input($_POST["nazioneP"]);
			$nCellulareP = test_input($_POST["nCellulareP"]);
			$nTelefonoP = test_input($_POST["nTelefonoP"]);

			$tipo = test_input($_POST["tipo"]);
			$denominazione = test_input($_POST["denominazione"]);
			$sedeUS = test_input($_POST["sedeUS"]);
			$annoUS = test_input($_POST["annoUS"]);

			$text = "$nome;$cognome;$dnascita;$sesso;$nazionalita;$via;$cap;$citta;$cantone;$nazione;$nCellulare;$nTelefono;$email;$nomeP;$cognomeP;$ruolo;$viaP;$cittaP;$capP;$cantoneP;$nazioneP;$nCellulareP;$nTelefonoP;$emailP;$oservazioni";
			$myFile= file_put_contents("dati.csv", $text . PHP_EOL, FILE_APPEND);

			$oservazioni = $nome = $cognome = $sesso = $dnascita = $email = $via = $citta = $cap = $nazionalita = $cantone = $nazione = $nCellulare = $nTelefono = "";

			$nomeP = $cognomeP = $ruolo = $emailP = $viaP = $cittaP = $capP = $cantoneP = $nazioneP = $nCellulareP = $nTelefonoP = "-";

			$nazione = $nazioneP = $nazionalita = "Svizzera";
			$cantone = "Ticino";
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>

	<div class="title">
	</div>
	<div class="panel">	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">	
			<table>
				<tr>
					<th class="subtitle" colspan="2">
						<h3>Dati anagrafici</h3>
					</th>
				</tr>
				<tr>
					<th>
						Nome :
					</th>
					<td>
						<input type="text" name="nome" value="<?php echo $nome?>" required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Cognome :
					</th>
					<td>
						<input type="text" name="cognome" value="<?php echo $cognome?>"  required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						 Data di nascita (gg-mm-aaaa):
					</th>
					<td>
						<input type="text" id="data" name="dnascita" value="<?php echo $dnascita?>" placeholder="gg-mm-aaaa" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" onchange="ifMinorenne()">
					</td>
				</tr>
				<tr>
					<th valign="top">
						Genere :
					</th>
					<td>
						<input type="radio" name="sesso" value="M" checked> Maschio
						<br>
						<input type="radio" name="sesso" value="F"> Femmina
					</td>
				</tr>
				<tr>
					<th>
						 Nazionalità :
					</th>
					<td>
						<input type="text" name="nazionalita" value="<?php echo $nazionalita?>"  required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Indirizzo :
					</th>
					<td>
						<input type="text" name="via" value="<?php echo $via?>"  required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						CAP :
					</th>
					<td>
						<input type="text" name="cap" value="<?php echo $cap?>" required pattern="^\d+$">
					</td>
				</tr>
				<tr>
					<th>
						Città :
					</th>
					<td>
						<input type="text" name="citta" value="<?php echo $citta?>" required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Cantone/ provincia :
					</th>
					<td>
						<input type="text" name="cantone" value="<?php echo $cantone?>"  required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Nazione :
					</th>
					<td>
						<input type="text" name="nazione" value="<?php echo $nazione?>"  required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Numero di cellulare :
					</th>
					<td>
						<input type="text" name="nCellulare" value="<?php echo $nCellulare?>" required pattern="^\d+$">
					</td>
				</tr>
				<tr>
					<th>
						Numero di telefono di casa :
					</th>
					<td>
						<input type="text" name="nTelefono" value="<?php echo $nTelefono?>" required pattern="^\d+$">
					</td>
				</tr>
				<tr>
					<th>
						 E-mail :
					</th>
					<td>
						<input type="text" name="email" value="<?php echo $email?>"  required pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$">
					</td>
				</tr>
				</table>


				<div id="minorenne">
				<table>
					<tr>
						<th class="subtitle" colspan="2">
							<h3>Dati anagrafici dell'autorità parentale</h3>
						</th>
					</tr>
					<tr>
						<th>
							 Nome :
						</th>
						<td>
							<input type="text" name="nomeP" value="<?php echo $nomeP?>"  required pattern="^(?=\s*\S).*$">
						</td>
					</tr>	
					<tr>
						<th>
							 Cognome :
						</th>
						<td>
							<input type="text" name="cognomeP" value="<?php echo $cognomeP?>"  required pattern="^(?=\s*\S).*$">
						</td>
					</tr>	
					<tr>
						<th>
							 Ruolo :
						</th>
						<td>
							<select name="ruolo">
							  	<option value="Padre" selected>Padre</option>
							  	<option value="Madre">Madre</option>
							  	<option value="Tutore">Tutore</option>
							</select>
						</td>
					</tr>

					<tr>
						<th>
							Indirizzo :
						</th>
						<td>
							<input type="text" name="viaP" value="<?php echo $viaP?>"  required pattern="^(?=\s*\S).*$">
						</td>
					</tr>
					<tr>
						<th>
							CAP :
						</th>
						<td>
							<input type="text" name="capP" value="<?php echo $capP?>" required pattern="^\d+$">
						</td>
					</tr>
					<tr>
						<th>
							Città :
						</th>
						<td>
							<input type="text" name="cittaP" value="<?php echo $cittaP?>" required pattern="^(?=\s*\S).*$">
						</td>
					</tr>
					<tr>
						<th>
							Cantone/ provincia :
						</th>
						<td>
							<input type="text" name="cantoneP" value="<?php echo $cantoneP?>"  required pattern="^(?=\s*\S).*$">
						</td>
					</tr>
					<tr>
						<th>
							Nazione :
						</th>
						<td>
							<input type="text" name="nazioneP" value="<?php echo $nazioneP?>"  required pattern="^(?=\s*\S).*$">
						</td>
					</tr>
					<tr>
						<th>
							Numero di cellulare :
						</th>
						<td>
							<input type="text" name="nCellulareP" value="<?php echo $nCellulareP?>" required pattern="^\d+$">
						</td>
					</tr>
					<tr>
						<th>
							Numero di telefono di casa :
						</th>
						<td>
							<input type="text" name="nTelefonoP" value="<?php echo $nTelefonoP?>" required pattern="^\d+$">
						</td>
					</tr>

					<tr>
						<th>
							 E-mail :
						</th>
						<td>
							<input type="text" name="emailP" value="<?php echo $emailP?>"  required pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$">
						</td>
					</tr>
					</table>			
				</div>

			<table>
				<tr>
					<th class="subtitle" colspan="2">
						<h3>Ultima scuola frequentata</h3>
					</th>
				</tr>
				<tr>
					<th>
						 Tipo :
					</th>
					<td>
						<select name="tipo">
						  	<option value="Elementare" selected>Elementare</option>
						  	<option value="Media">Media</option>
						  	<option value="Superiore">Superiore</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						Denominazione :
					</th>
					<td>
						<input type="text" name="denominazione" value="<?php echo $denominazione?>"  required attern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Sede :
					</th>
					<td>
						<input type="text" name="sedeUS" value="<?php echo $sedeUS?>" required pattern="^(?=\s*\S).*$">
					</td>
				</tr>
				<tr>
					<th>
						Anno :
					</th>
					<td>
						<input type="text" name="annoUS" value="<?php echo $annoUS?>" required pattern="[0-9]{4}">
					</td>
				</tr>
			</table>

			<table>
				
				<tr>
					<th class="subtitle" colspan="2">
						<h3>Situazione professionale attuale</h3>
					</th>
				</tr>

				<tr>
					<th valign="top">
						Situazione attuale :
					</th>
					<td>
						<input type="radio" name="prof" value="Studente" checked> Studente
						<br>
						<input type="radio" name="prof" value="Lavoro"> Lavoro
					</td>
				</tr>
			</table>

			<table>

				<tr>
					<th class="subtitle" colspan="2">
						<h3>Osservazioni</h3>
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<textarea name="osservazioni" maxlength="239" rows="5" cols="40"></textarea>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td colspan="2">
						<input type="submit" name="submit" value="Invia">  
					</td>
				</tr>
			</table>
			
		</form>
	</div>
	<div id="bottom">
		<br>
		&copy elia.manassero
	</div>
	<script type="text/javascript">
		function ifMinorenne(){
			var oggi = new Date(Date.now()).getFullYear();
			var d = document.getElementById("data").value.slice(6, 10);
			alert(d);
			if(oggi-d < 18){
				document.getElementById("minorenne").style.display = "block";
			}
			else{
				document.getElementById("minorenne").style.display = "none";
			}
		}
	</script>
</body>
</html>