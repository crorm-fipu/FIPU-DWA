<?php

include 'baza.php';

// Funkcija novi doktor unosi novu recenziju s podacima koje je korisnik prosljedio
function novi_doktor($imeprezime, $grad, $podrucje)
{
	// Unos u bazu
    $insertNovi = "INSERT INTO doktor (id, ime_i_prezime, grad, podrucje) VALUES (default, '" . $imeprezime . "', '" . $grad . "', '" . $podrucje . "')";
    $rsInsert = izvrsiUpit($insertNovi);

    echo "Uspjesno ste kreirali novog doktora!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Doktor</title>
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
				<li style="margin-left:auto;"><a href="prijava.php">Odjava</a></li>
			</ul>

		</nav>

	</header>

	<main>

		<h1 style="text-align: center;">Kreiraj novog doktora</h1>


		<?php

			// Provjeravamo da li je gumb submit kliknut ako je izvšravamo ostale dijelove unutar if-a
    	if (isset($_POST['submit'])) {

				// Spremanje podataka koji su poslani iz forme u varijable
        $imeprezime = $_POST['imeprezime'];
        $grad = $_POST['grad'];
        $podrucje = $_POST['podrucje'];

				// Pozivamo funkciju novi doktor koja će unjeti novog doktora u bazu
        novi_doktor($imeprezime, $grad, $podrucje);
    	}
		?>


		<form class="form" method="post" action="">

			<label for="imeprezime">Ime i prezime: </label>
			<input type="text" class="imeprezime" name="imeprezime" id="imeprezime" style="margin-right: 20px;">

			<label for="grad">Grad: </label>
			<input type="text" class="grad" name="grad" id="grad">

			<label for="podrucje" style="margin-left: 20px;">Podrucje medicine: </label>
			<input type="text" class="podrucje" name="podrucje" id="podrucje">

			<input type="submit" class="submit" id="submit" name="submit" value="Kreiraj">
		</form>


	</main>

</body>

</html>