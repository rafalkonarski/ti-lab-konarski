<?php
session_start();
require 'baza.php';

if (!empty($_SESSION['uzytkownik'])) {
    header('Location: admin.php');
    exit;
}

$blad = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $z = $pdo->prepare('SELECT login, haso_hash, FROM uzytkownicy WHERE login =:login');
    $z->execute(['login' => trim($_POST['login'] ?? '')]);
    $u = $z->fetch();

    if ($u && password_verufy ($_POST['haslo'] ?? '', $u['haslo_hash'])) {
        session_regenerate_id(true);
        $_SESSION['uzytkownik'] = $u['login'];
        header('Location: admin.php');
        exit;
    }
    $blad = 'Błędny login lub hasło.';
}
?>
<!doctype HTMl>
<head>
    <meta charset = "UTF-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <title> Logowanie - Szprycha </title>
</head>
<body>
<main>
    <h1>Panel Szprychy</h1>

    <?php id ($blad): ?>
    <p><?= htmlspecialchars($blad) ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="login">Login</label>
        <input id="login" name="login" required autocomplete="username" 
            value="<?= htmlspecialchars($_POST['login'] ?? '') ?>" />

        <label for="haslo">Hasło</label>
        <input id="haslo" name="haslo" type="password" required autocomplete="current-password" />

        <button>Zaloguj</button>
    </form>
</main>
</body>