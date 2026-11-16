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

    if ($akcja === 'usun') {
        $z = $pdo->prepare('DELETE FROM uslugi WHERE id = :id');
        $z->execute(['id' => (int) ($_POST['id'] ?? 0)]);
        header('Location: admin.php?ok=usunieto');
        exit;
    }
}

$komunikaty = [
    'dodano' => 'Usługa dodana.',
    'usunieto' => 'Usługa usunięta.',
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
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous" />
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <span class="navbar-brand">Szprycha · panel</span>
        <div class="d-flex align-items-center gap-3">
          <span class="navbar-text">Zalogowany: <?= htmlspecialchars($_SESSION['uzytkownik']) ?></span>
          <a href="index.php" class="btn btn-sm btn-outline-light">Strona</a>
          <a href="wyloguj.php" class="btn btn-sm btn-light">Wyloguj</a>
        </div>
      </div>
    </nav>

    <main class="container py-4">
      <h1 class="h3 mb-4">Usługi w cenniku</h1>

      <?php if ($ok): ?>
        <div class="alert alert-success"><?= htmlspecialchars($ok) ?></div>
      <?php endif; ?>
      <?php if ($blad): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($blad) ?></div>
      <?php endif; ?>

      <div class="row g-4">
        <div class="col-lg-8">
          <div class="table-responsive">
            <table class="table table-striped align-middle bg-white">
              <thead>
                <tr>
                  <th>Usługa</th>
                  <th>Czas</th>
                  <th class="text-end">Cena</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($uslugi as $usluga): ?>
                  <tr>
                    <td><?= htmlspecialchars($usluga['nazwa']) ?></td>
                    <td><?= htmlspecialchars($usluga['czas']) ?></td>
                    <td class="text-end text-nowrap"><?= (int) $usluga['cena'] ?> zł</td>
                    <td class="text-end">
                      <form method="post" class="d-inline">
                        <input type="hidden" name="akcja" value="usun" />
                        <input type="hidden" name="id" value="<?= (int) $usluga['id'] ?>" />
                        <button class="btn btn-sm btn-outline-danger">Usuń</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-lg-4">
          <form method="post" class="card card-body">
            <h2 class="h5 mb-3">Dodaj usługę</h2>
            <input type="hidden" name="akcja" value="dodaj" />
            <div class="mb-3">
              <label for="nazwa" class="form-label">Nazwa</label>
              <input id="nazwa" name="nazwa" class="form-control" required maxlength="100" />
            </div>
            <div class="mb-3">
              <label for="czas" class="form-label">Czas realizacji</label>
              <input id="czas" name="czas" class="form-control" maxlength="20" placeholder="np. 2h" />
            </div>
            <div class="mb-3">
              <label for="cena" class="form-label">Cena (zł)</label>
              <input id="cena" name="cena" type="number" min="1" class="form-control" required />
            </div>
            <button class="btn btn-primary w-100">Dodaj</button>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>