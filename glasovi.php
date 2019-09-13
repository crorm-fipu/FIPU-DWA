<?php

include 'baza.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Home</title>
</head>

<body>

	<header>

		<nav>

		<ul>
        <li><a href="index-prijavljeni.php">Posljednje recenzije</a></li>
        <li><a href="doktori-ocjene.php">Doktori - ocjene</a></li>
				<li><a href="glasovi.php">Doktori - broj glasova</a></li>
				<li><a href="novi-doktor.php">Novi doktor</a></li>
				<li><a href="nova-recenzija.php">Nova recenzija</a></li>
				<li style="margin-left:auto;"><a href="prijava.php">Odjava</a></li>
			</ul>

		</nav>

	</header>

	<main>

	<?php

// Upit na bazu koji uz pomoć SQL funkcije COUNT zbraja ukupni broj glasova o određenom doktoru
$ocjena = "SELECT ime_i_prezime, COUNT(ocjena) AS glasovi FROM doktor d, doktor_ocjena do WHERE d.id = do.id_doktor GROUP BY ime_i_prezime ORDER BY COUNT(ocjena) DESC";
$sr = izvrsiUpit($ocjena);

// Ispis tablice kao HTML elementa
echo "<table>";
echo "<th>Ime i prezime</th>";
echo "<th>Broj glasova</th>";

// Iteracija kroz rezultat koji nam vraća izvršeni SQL upit
while (($row = mysqli_fetch_array($sr, MYSQLI_ASSOC)) != false) {
	$ocjene = array();
	$ocjene[] = $row;

	// Iteracija kroz polje u koje smo spremili rezultat SQL upita
	foreach ($ocjene as $data) {

		// Ispis podataka iz polja o svakom pojedinom doktoru
		echo "<tr>";
		echo "<td>" . $data['ime_i_prezime'] . "</td>";
		echo "<td>" . $data['glasovi'] . "</td>";
		echo "</tr>";

	}
}

		?>

	</main>

</body>

</html>