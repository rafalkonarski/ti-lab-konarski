<?php
require 'auth.php';
require 'baza.php';

$blad = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $akcja = $_POST['akcja'] ?? '';

    if ($akcja === 'dodaj') {
        $nazwa = trim($_POST['nazwa'] ?? '');
        $czas = trim($_POST['czas'] ?? '');
        $cena = (int) ($_POST['cena'] ?? 0);

        if ($nazwa !== '' && mb_strlen($nazwa) <= 100 && mb_strlen($czas) <= 20 && $cena > 0) {
            $z = $pdo->prepare('INSERT INTO uslugi (nazwa, czas, cena) VALUES (:nazwa, :czas, :cena)');
            $z->execute(['nazwa' => $nazwa, 'czas' => $czas, 'cena' => $cena]);
            header('Location: admin.php?ok=dodano');
            exit;
        }

        $blad = 'Podaj nazwę (do 100 znaków) i cenę większą od zera.';
    }
}

$komunikaty = [
    'dodano' => 'Usługa dodana.',
];
$ok = $komunikaty[$_GET['ok'] ?? ''] ?? '';

$uslugi = $pdo->query('SELECT id, nazwa, czas, cena FROM uslugi ORDER BY nazwa')->fetchAll();
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel · Szprycha</title>
  </head>
  <body>
    <p>Zalogowany: <?= htmlspecialchars($_SESSION['uzytkownik']) ?> · <a href="index.php">Strona</a> · <a href="wyloguj.php">Wyloguj</a></p>

    <main>
      <h1>Usługi w cenniku</h1>

      <?php if ($ok): ?>
        <p><?= htmlspecialchars($ok) ?></p>
      <?php endif; ?>
      <?php if ($blad): ?>
        <p><?= htmlspecialchars($blad) ?></p>
      <?php endif; ?>

      <table>
        <thead>
          <tr>
            <th>Usługa</th>
            <th>Czas</th>
            <th>Cena</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($uslugi as $usluga): ?>
            <tr>
              <td><?= htmlspecialchars($usluga['nazwa']) ?></td>
              <td><?= htmlspecialchars($usluga['czas']) ?></td>
              <td><?= (int) $usluga['cena'] ?> zł</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <h2>Dodaj usługę</h2>
      <form method="post">
        <input type="hidden" name="akcja" value="dodaj" />

        <label for="nazwa">Nazwa</label>
        <input id="nazwa" name="nazwa" required maxlength="100" />

        <label for="czas">Czas realizacji</label>
        <input id="czas" name="czas" maxlength="20" placeholder="np. 2h" />

        <label for="cena">Cena (zł)</label>
        <input id="cena" name="cena" type="number" min="1" required />

        <button>Dodaj</button>
      </form>
    </main>
  </body>
</html>