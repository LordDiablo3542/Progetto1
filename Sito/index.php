<!DOCTYPE html>
<html>
<head>
	<title>Espoprofessioni</title>
	<style type="text/css">
		body {
			margin: 0px;
		}
		th {
			text-align: right;
			padding-right: 15px;
		}
		td {
			padding-left: 15px;
		}
		div {
			background-color: DodgerBlue;
			height: 100px;
			margin: 0px;
		}
		th,td {
			font-family: "Arial", sens-serif;
			padding-top: 20px;
		}
	</style>
</head>
<body>
	<div>
		cpt
	</div>
	<form action="index.php" method="post">
		<table style="width: 100%">
			<tr>
				<th style="width: 50%; border: black solid">
					Nome :
				</th>
				<td  style="width: 50%; border: black solid">
					<input type="text" name="nome">
				</td>
			</tr>
			<tr>
				<th>
					Cognome :
				</th>
				<td>
					<input type="text" name="cognome">
				</td>
			</tr>
			<tr>
				<th>
					Sesso :
				</th>
				<td>
					<input type="radio" name="sesso" value="M" checked> M
					<input type="radio" name="sesso" value="F"> F
				</td>
			</tr>
			<tr>
				<th>
					 Data di nascità :
				</th>
				<td>
					<input type="date" name="dnascita">
				</td>
			</tr>
			<tr>
				<th>
					Via :
				</th>
				<td>
					<input type="text" name="via">
				</td>
			</tr>
			<tr>
				<th>
					Città :
				</th>
				<td>
					<input type="text" name="citta">
				</td>
			</tr>
			<tr>
				<th>
					CAP :
				</th>
				<td>
					<input type="text" name="cap">
				</td>
			</tr>
		</table>
	</form>
	<bottom>
		&copy elia.manassero
	</bottom>
	<?php
	
	?>
</body>
</html>