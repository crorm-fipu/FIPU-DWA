<?php
    //prima samo jedan argument koji cu joj proslijedit
    function izvrsiUpit($upit){
        $konekcija = mysqli_connect("localhost", "root", "", "medrev_baza_prava"); // Podaci za spajanje na bazu
        mysqli_set_charset($konekcija, "utf8"); // konekcija i charset
        $vraceno = mysqli_query($konekcija, $upit); // slanje upita na  bazu s konekcijom
        mysqli_close($konekcija); // zatvaranje konekcije
        return $vraceno; // vraća rez
    }

?>