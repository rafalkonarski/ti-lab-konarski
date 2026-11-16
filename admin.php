<?php
require 'auth.php';
?>
<!doctype HTML>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <title>Panel - Szprycha</title>
    </head>
    <body>
        <h1>Witaj, <?= htmlspecialchars($_SESSION['uzytkownik']) ?></h1>
        <p><a href="wyloguj.php">Wyloguj</a></p>
    </body>
</html>