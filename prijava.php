<?php

include 'baza.php';

//  ako je izvšravamo ostale dijelove unutar if-a
if (isset($_POST["submit"])) {

    // pitam bazu da li postoji korisnik s unesenom kombinacijom emaila i lozinke
    $sqlprijava = "SELECT * FROM korisnik WHERE email = '" . $_POST['email'] . "' AND lozinka = '" . $_POST['lozinka'] . "' ";
    $sqlresult = izvrsiUpit($sqlprijava);

    // ako postoji upit će vratiti barem 1 rezultat a ako ne vraća 0 pa se ispisuje poruka
    if (mysqli_num_rows($sqlresult) > 0) {
        // preusmjerit ce me na stranicu za gdje su mi posljednje recenzije
        header("Location: posljednje-recenzije.php");
    } else {
        echo "Unešeni pogrešni podaci! Pokušajte ponovno";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Prijava</title>
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

    <h3 class="prijava-title">Prijavi se</h3>

    <form class="form" method="post" action="">

        <label for="email">Email: </label>
        <input type="email" class="email" name="email" id="email" style="margin-right: 20px;">

        <label for="lozinka">Lozinka: </label>
        <input type="password" class="lozinka" name="lozinka" id="lozinka">

        <input type="submit" class="submit" id="submit" name="submit" value="Prijavi se">
    </form>

</body>

</html>