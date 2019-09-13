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
				<li><a href="posljednje-recenzije.php">Posljednje recenzije</a></li>
				<li><a href="ocjene.php">Doktori - ocjene</a></li>
				<li><a href="glasovi.php">Doktori - broj glasova</a></li>
				<li><a href="novi-doktor.php">Novi doktor</a></li>
				<li><a href="nova-recenzija.php">Nova recenzija</a></li>
				<li><a href="prijava.php">Odjava</a></li>
			</ul>

		</nav>

	</header>

	<main>

	<?php

// Upit na bazu koji vraća sve recenzije o svim doktorima
$ocjena = "SELECT * FROM doktor_ocjena";
$srOcjena = izvrsiUpit($ocjena);

// Ispis tablice kao html doc
echo "<table>";
echo "<th>ID doktora</th>";
echo "<th>Ocjena</th>";
echo "<th>Komentar</th>";


// Iteracija kroz rezultat koji nam vraća izvršeni SQL upit
while (($row = mysqli_fetch_array($srOcjena, MYSQLI_ASSOC)) != false) {
	$ocjene = array();
	$ocjene[] = $row;

	// Iteracija kroz polje u koje smo spremili rezultat SQL upita
	foreach ($ocjene as $data) {

		// Ispis podataka iz polja o svakom pojedinom doktoru
		echo "<tr>";
		echo "<td>" . $data['id_doktor'] . "</td>";
		echo "<td>" . $data['ocjena'] . "</td>";
		echo "<td>" . $data['komentar'] . "</td>";
		echo "</tr>";

	}
}

		?>

	</main>

</body>

</html>