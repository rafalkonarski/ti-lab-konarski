<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Ten plik uruchamia się tylko z terminala.');
}

$haslo = $argv[1] ?? '';
if (strlen($haslo) < 8) {
    exit("Uzycie: php.steup.php TWOJE_HASLO min. 8 znaków\n");
}

require 'baza.php';

$pdo->exec('CREATE TABLE IF NOT EXISTS uslugi (
id INTEGER PRIMARY KEY AUTOINCREMENT,
nazwa TEXT NOT NULL,
czas TEXT NOT NULL DEFAULT \'\',
cena INTEGER NOT NULL,
popularnosc INTERGER NOT NULL DEFAULT 0
)');

$pdo->exec('CREATE TABLE IF NOT EXISTS uzytkownikcy (
id INTEGER PRIMARY KEY AUTOINCREMENT,
login TEXT NOT NULL UNIQUE,
haslo_hash TEXT NOT NULL
)');

$liczbaUslug = $pdo->query('SELECT COUNT (*) FROM "uslugi') -> fetchColumn();
if ($liczbaUslug == 0){
    $z = $pdo->prepare('INSERT INTO uslugi(nazwa, czas, cena, popularnosc)
    VALUES (:nazwa, :czas, :cena, :popularnosc)');
    $poczatkoweuslugi = [
        ['nazwa' => 'Centrowanie koła (tensometr)', 'czas' => '24h', 'cena' => 50, 'popularnosc' => 45],
        ['nazwa' => 'Kompletny przegląd generalny', 'czas' => '48h', 'cena' => 250, 'popularnosc' => 45],
        ['nazwa' => 'Odpowietrzanie i regulacja hamulców', 'czas' => '2h', 'cena' => 60, 'popularnosc' => 20],
        ['nazwa' => 'Regulacja przerzutek', 'czas' => '3h', 'cena' => 50, 'popularnosc' => 35],
        ['nazwa' => 'Zalanie opon mlekiem (Tubeless)', 'czas' => '3h', 'cena' => 45, 'popularnosc' => 15],
        ];
        foreach ($poczatkoweuslugi as $usluga) {
            $z->execute($usluga);
        }
}

$liczbaKont =$pdo->query('SELECT COUNT(*) FROM uzytkownicy') -> fetchColumn();
if($liczbaKont == 0){
    $z = $pdo->prepare('INSERT INTO uzytkownicy(login,haslo_hash) VALUES (:login, :hash)');
    $z-> execute([
        'login' => 'admin',
        'hash' => password_hash($haslo, PASSWORD_DEFAULT),
    ]);
}
echo "Baza gotowa. \n";
?>