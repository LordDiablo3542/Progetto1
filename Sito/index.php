<!DOCTYPE html>
<html>
<head>
	<title>Espoprofessioni</title>
	<style type="text/css">
		.button {
			width: 80px;
			border: none;
			background-color: #00e6ac;
			color: white;
			border-radius: 5px;
			padding: 3px 0px;
			font-size: 18px;
		}
		body {
			margin: 0px;
			font-family: "Arial", sens-serif;
			background-color: #f6fff6;
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
		.title{
			background-color: #00cc99;
			margin: 0px;
			text-align: center;
			color: white;
			padding:15px 0px ;

		}
		th,td {
			padding-top: 20px;
		}
		#bottom {
			background-color: #333333;
			color: white;
			text-align: center;
			height: 100px;
			margin: 0px;
		}
		.subtitle {
			text-align: left;
			color: white;
			background-color: #00e6ac;
			padding-left: 15px;
			border-radius: 10px;
		}
	</style>
</head>
<body onload="ifMinorenne(), situazioneAttuale(), aprendistato()">

	<?php
		$osservazioni = $nome = $cognome = $sesso = $dnascita = $email = $via = $citta = $cap =$nazione = $nCellulare = $nTelefono = $cantone ="";

		$nomeP = $cognomeP = $ruolo = $emailP = $viaP = $cittaP = $capP = $cantoneP = $nazioneP = $nCellulareP = $nTelefonoP =  "";

		$tipo = $denominazione = $sedeUS = $annoUS = "";

		$prof = $scuola = $sede = $annoS = $liv = $annoA = $professione = "";

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
			$osservazioni = test_input($_POST["osservazioni"]);

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

			$prof = test_input($_POST["prof"]);
			$scuola = test_input($_POST["scuola"]);
			$sede = test_input($_POST["sede"]);
			$annoS = test_input($_POST["annoS"]);
			$liv = test_input($_POST["liv"]);
			$annoA = test_input($_POST["annoA"]);
			$professione = test_input($_POST["professione"]);

			$text = "\n$nome;$cognome;$dnascita;$sesso;$nazionalita;$via;$cap;$citta;$cantone;$nazione;$nCellulare;$nTelefono;$email;$nomeP;$cognomeP;$ruolo;$viaP;$capP;$cittaP;$cantoneP;$nazioneP;$nCellulareP;$nTelefonoP;$emailP;$tipo;$denominazione;$sedeUS;$annoUS;$prof;$scuola;$sede;$annoS;$professione;$liv;$annoA;$osservazioni";

			$myfile = fopen("dati.csv", "a+") or die("Unable to open file!");
			if(filesize("dati.csv") == 0){
				$first = "Nome;Cognome;Data di nascita;Genere;Nazionalità;Via;CAP;Citta;Cantone;Nazione;Num. cellulare;Num. telefono;Email;Nome autorità parentale;Cognome autorità parentale;Ruolo;Via autorità parentale;CAP autorità parentale;Citta autorità parentale;Cantone autorità parentale;Nazione autorità parentale;Num. cellulare autorità parentale;Num. telefono autorità parentale;Email autorità parentale;Tipo ultima scuola;Denominazione ultima scuola;Sede ultima scuola;Anno ultima scuola;Professione;Scuola;Sede;Anno scolastico;Nome professione;Livello;Anno aprendistato;Osservazioni";
				fwrite($myfile, $first);
			}
			fwrite($myfile, $text);
			fclose($myfile);
			
			$osservazioni = $nome = $cognome = $sesso = $dnascita = $email = $via = $citta = $cap =$nazione = $nCellulare = $nTelefono = $cantone ="";

			$nomeP = $cognomeP = $ruolo = $emailP = $viaP = $cittaP = $capP = $cantoneP = $nazioneP = $nCellulareP = $nTelefonoP =  "";

			$tipo = $denominazione = $sedeUS = $annoUS = "";

			$prof = $scuola = $sede = $annoS = $liv = $annoA = $professione = "";

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
		<h1>Dati dei visitatori di espoprofessione</h1>
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


			<table id="minorenne">
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
						<input type="text" name="nomeP" value="<?php echo $nomeP?>"  required pattern="^(?=\s*\S).*$" class="min">
					</td>
				</tr>	
				<tr>
					<th>
						 Cognome :
					</th>
					<td>
						<input type="text" name="cognomeP" value="<?php echo $cognomeP?>"  required pattern="^(?=\s*\S).*$" class="min">
					</td>
				</tr>	
				<tr>
					<th>
						 Ruolo :
					</th>
					<td>
						<select name="ruolo" class="min">
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
						<input type="text" name="viaP" value="<?php echo $viaP?>"  required pattern="^(?=\s*\S).*$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						CAP :
					</th>
					<td>
						<input type="text" name="capP" value="<?php echo $capP?>" required pattern="^\d+$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						Città :
					</th>
					<td>
						<input type="text" name="cittaP" value="<?php echo $cittaP?>" required pattern="^(?=\s*\S).*$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						Cantone/ provincia :
					</th>
					<td>
						<input type="text" name="cantoneP" value="<?php echo $cantoneP?>"  required pattern="^(?=\s*\S).*$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						Nazione :
					</th>
					<td>
						<input type="text" name="nazioneP" value="<?php echo $nazioneP?>"  required pattern="^(?=\s*\S).*$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						Numero di cellulare :
					</th>
					<td>
						<input type="text" name="nCellulareP" value="<?php echo $nCellulareP?>" required pattern="^\d+$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						Numero di telefono di casa :
					</th>
					<td>
						<input type="text" name="nTelefonoP" value="<?php echo $nTelefonoP?>" required pattern="^\d+$" class="min">
					</td>
				</tr>
				<tr>
					<th>
						 E-mail :
					</th>
					<td>
						<input type="text" name="emailP" value="<?php echo $emailP?>"  required pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" class="min">
					</td>
				</tr>
			</table>

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
						<input type="radio" name="prof" value="Studente" onchange="situazioneAttuale()" class="situazione" checked> Studente
						<br>
						<input type="radio" name="prof" value="Lavoro" onchange="situazioneAttuale()" class="situazione"> Lavoro
					</td>
				</tr>
			</table>

			<table id="lavoro">
				<tr>
					<th>
						Professione :
					</th>
					<td>
						<input type="text" name="professione" value="<?php echo $professione?>" required pattern="^(?=\s*\S).*$" class="lav">
					</td>
				</tr>

				<tr>
					<th valign="top">
						Livello :
					</th>
					<td>
						<input type="radio" name="liv" value="Apprendista"  class="lav" checked onchange="aprendistato()"> Apprendista
						<br>
						<input type="radio" name="liv" value="Prossionista"  class="lav" onchange="aprendistato()"> Professionista
						<br>
						<input type="radio" name="liv" value="Indipendente" class="lav" onchange="aprendistato()"> Indipendente
					</td>
				</tr>

				<tr>
					<th id="lav">
						Anno aprendistato :
					</th>
					<td>
						<input type="text" name="annoA" value="<?php echo $annoA?>" required pattern="[0-9]" class="lav">
					</td>
				</tr>
			</table>

			<table id="studente">
				<tr>
					<th>
						Scuola :
					</th>
					<td>
						<input type="text" name="scuola" value="<?php echo $scuola?>" required pattern="^(?=\s*\S).*$" class="stu">
					</td>
				</tr>
				<tr>
					<th>
						Sede :
					</th>
					<td>
						<input type="text" name="sede" value="<?php echo $sede?>" required pattern="^(?=\s*\S).*$" class="stu">
					</td>
				</tr>
				<tr>
					<th>
						Anno scolastico :
					</th>
					<td>
						<input type="text" name="annoS" value="<?php echo $annoS?>" required pattern="[0-9]" class="stu">
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
					<td colspan="2" style="padding-right: 30px;">
						<textarea name="osservazioni" maxlength="239" rows="5" style="width: 100%;" value="<?php echo $osservazioni?>"></textarea>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td style="text-align: right; padding-left: 0px;">
						<input class="button" type="submit" name="submit" value="Invia">
						<a href="dati.csv" download>
							<input class="button" type="button" name="submit" value="Scarica">
						</a>
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
			var data = document.getElementById("data").value;
			var a = data.slice(6, 10);
			var m = data.slice(3, 5);
			var g = data.slice(0, 2);
			var min = document.getElementsByClassName("min");
			if(oggi-a < 18){
				for (var i = min.length - 1; i >= 0; i--) {
					min[i].disabled = false;
				}
				document.getElementById("minorenne").style.display = "block";
			}
			else{
				for (var i = min.length - 1; i >= 0; i--) {
					min[i].disabled = true;
				}
				document.getElementById("minorenne").style.display = "none";
			}
		}

		function situazioneAttuale(){
			var l = document.getElementById("lavoro");
			var cl = document.getElementsByClassName("lav");
			var s = document.getElementById("studente");
			var cs = document.getElementsByClassName("stu");
			var d = document.getElementsByName("prof");
			if(d[0].checked){
				for (var i = cl.length - 1; i >= 0; i--) {
					cl[i].disabled = true;
				}
				for (var i = cs.length - 1; i >= 0; i--) {
					cs[i].disabled = false;
				}
				l.style.display = "none";
				s.style.display = "block";
			}
			else if(d[1].checked){
				for (var i = cl.length - 1; i >= 0; i--) {
					cl[i].disabled = false;
				}
				for (var i = cs.length - 1; i >= 0; i--) {
					cs[i].disabled = true;
				}
				l.style.display = "block";
				s.style.display = "none";
			}
		}

		function aprendistato(){
			var d = document.getElementsByName("liv");
			var cl = document.getElementsByClassName("lav")[4];
			var dl = document.getElementById("lav");
			if(d[0].checked){
				cl.disabled = false;
				dl.style.color = "black";
			}
			else{
				cl.disabled = true;
				dl.style.color = "#CCCCCC";
			}
		}
	</script>
</body>
</html>