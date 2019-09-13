<?php

include 'baza.php';

// Funkcija nova recenzija unosi novu recenziju s podacima koje je korisnik prosljedio
function nova_recenzija($idDoktor, $idKorisnik, $ocjena, $komentar)
{

		// Unos u bazu
    $insertNovi = "INSERT INTO doktor_ocjena (id_doktor, id_korisnik, ocjena, komentar) VALUES ('" . $idDoktor . "', '" . $idKorisnik . "', '" . $ocjena . "', '" . $komentar . "')";
    $rsInsert = izvrsiUpit($insertNovi);

		echo "Uspjesno ste kreirali novu recenziju!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Recenzija</title>
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

		<h1 style="text-align: center;">Dodaj novu recenziju</h1>


		<?php

			// Provjeravamo da li je gumb submit kliknut ako je izvšravamo ostale dijelove unutar if-a
    	if (isset($_POST['submit'])) {

				// Spremanje podataka koji su poslani iz forme u varijable
        $idDoktor = $_POST['idDoktor'];
				$ocjena = $_POST['ocjena'];
				$komentar = $_POST['komentar'];

				// Upit koji vraća sve podatke o korisniku koji ima uneseni email
				$korisnici = "SELECT * FROM korisnik WHERE email = '" . $_POST['email'] . "'";
				$sr = izvrsiUpit($korisnici);

				// Provjera da je ocjena između 1 i 5
				if ($ocjena >= 1 && $ocjena <= 5) {

					// Iteracija kroz polje u koje smo spremili rezultat SQL upita
					while (($row = mysqli_fetch_array($sr, MYSQLI_ASSOC)) != false) {
						$korisnik = array();
						$korisnik[] = $row;

						// S obzirom da svaki korisnik ima unikatan email foreach će napraviti jednu iteraciju
						// U toj iteraciji će pozvati funkciju nova recenzija sa svim njezinim argumentima
						foreach ($korisnik as $data) {
							nova_recenzija($idDoktor, $data['id'], $ocjena, $komentar);
						}
					}
				} else {
					echo "Ocjena mora biti u rasponu od 1 do 5! Ponovite unos!";
				}
				
    	}
		?>

		<!-- Forma koja se šalje s podacimaima za unos nove recenzije -->
		<form class="form" method="post" action="">

			<label for="doktor">Doktor: </label>
			
			<?php

			// Upit na bazu koji vraća sve podatke o svakom doktoru
			$doktori = "SELECT * FROM doktor";
			$sr = izvrsiUpit($doktori);

			// Ispis <select> HTML elementa koji služi za odabir doktora prilikom pisanja recenzije
			echo "<select name='idDoktor'>";

			// Iteracija kroz rezultat koji nam vraća izvršeni SQL upit
			while (($row = mysqli_fetch_array($sr, MYSQLI_ASSOC)) != false) {
				$doktor = array();
				$doktor[] = $row;

				// Iteracija kroz polje u koje smo spremili rezultat SQL upita
				foreach ($doktor as $data) {
					// Ispis HTML elementa <option> koji će prikazati svakog doktora u <select> elementu>
    			echo "<option value='" . $data['id'] . "'>" . $data['ime_i_prezime'] . "</option>";
				}
			}

			echo "</select>";			
			?>

			<label for="email" style="margin-left: 20px;">Vaš email: </label>
			<input type="email" class="email" name="email" id="email" style="margin-right: 20px; height: 100%;">

			<label for="ocjena">Ocjena: </label>
			<input type="text" class="ocjena" name="ocjena" id="ocjena" style="margin-right: 20px; height: 100%;">

			<label for="komentar" style="margin-left: 20px;">Komentar: </label>
			<textarea rows="4" cols="30" class="komentar" name="komentar" id="komentar"></textarea>

			<input type="submit" class="submit" id="submit" name="submit" value="Dodaj">
		</form>


	</main>

</body>

</html>