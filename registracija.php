<?php

include 'baza.php';

/* ovak se definiraaaaa*/
function novi_korisnik($ime, $prezime, $email, $lozinka)
{
    // Unos u bazu korisnik mi je ime tablice a ovo su rowsi i koje vrijednosti zelim unjeti
    $insertNovi = "INSERT INTO korisnik (id, ime, prezime, email, lozinka) VALUES (default, '" . $ime . "', '" . $prezime . "', '" . $email . "', '" . $lozinka . "')";
    $rsInsert = izvrsiUpit($insertNovi);

    echo "Uspjesno ste kreirali korisnika!";

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Registracija</title>
</head>

<body>

    <header>

        <nav>
            <ul>
                <li><a href="medrev.php">Početna</a></li>
                <li><a href="o_nama.html">O Nama</a></li>
                <li><a href="prijava.php">Prijava</a></li>
				<li><a href="registracija.php">Registracija</a></li>
            </ul>
        </nav>
    </header>

    <h3 class="prijava-title">Registriraj se</h3>

<?php
    // provjera ako je stisnut roka dalje po ifu
    // isset je takoder funkcija u php s kojom mogu provjerit dali je radnja obavljena, to mogu koristit i na drugima
    if (isset($_POST['submit'])) { 
        
        // i sad spremi podatke iz forme u varijable
        // ovo je easy, imenovanje varijable samo dolar prije
        $ime = $_POST['ime']; // $_POST je funkcija u php-u koja dohvaća podatke kad je forma poslana
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $lozinka = $_POST['lozinka'];

        // i onda pozivam ovu funkciju i dodjelim joj ova 4 argumenta
        novi_korisnik($ime, $prezime, $email, $lozinka);    
    }



?>

    <form class="form" method="post" action="">

        <label for="ime">Ime: </label> <!-- taj label mi je samo text, ondosno "Ime:-->
        <input type="text" class="ime" name="ime" id="ime" style="margin-right: 20px;"> <!-- a input ono sto ja unosim -->

        <label for="prezime">Prezime: </label>
        <input type="text" class="prezime" name="prezime" id="prezime" style="margin-right: 20px;">

        <label for="email">Email: </label>
        <input type="email" class="email" name="email" id="email" style="margin-right: 20px;">

        <label for="lozinka">Lozinka: </label>
        <input type="password" class="lozinka" name="lozinka" id="lozinka">

        <input type="submit" class="submit" id="submit" name="submit" value="Registriraj se">
        <!-- sa ovim submittam cijelu formu i sve podatke sa njom,  pa ide gore u if za provjeru-->
    </form>

</body>

</html>