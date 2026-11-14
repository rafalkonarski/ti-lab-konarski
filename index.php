<?php
$firma = 'Szprycha — Serwis Rowerowy';
$rok = date('Y');
$imie = $_GET['imie'] ?? 'Gościu';

$cennik = [
    ['nazwa' => 'Centrowanie koła (tensometr)', 'czas' => '24h', 'cena' => 50],
    ['nazwa' => 'Kompletny przegląd generalny', 'czas' => '48h', 'cena' => 250],
    ['nazwa' => 'Odpowietrzanie i regulacja hamulców', 'czas' => '2h', 'cena' => 60],
    ['nazwa' => 'Regulacja przerzutek', 'czas' => '3h', 'cena' => 50],
    ['nazwa' => 'Zalanie opon mlekiem (Tubeless)', 'czas' => '1h', 'cena' => 45]
];
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title><?= htmlspecialchars($firma) ?></title>
    <script src="app.js" defer></script>
  </head>
  <body>
    <header class="site-header">
      <a class="logo" href="#">
        <svg viewBox="0 0 120 64" width="60" height="32" role="img" aria-labelledby="logo-tytul">
          <title id="logo-tytul">Szprycha</title>
          <circle cx="28" cy="42" r="18" fill="none" stroke="#0f766e" stroke-width="5"/>
          <circle cx="92" cy="42" r="18" fill="none" stroke="#0f766e" stroke-width="5"/>
          <polyline points="28,42 48,14 80,14 92,42" fill="none" stroke="#0f172a" stroke-width="5" stroke-linecap="round"/>
          <polyline points="48,14 60,42 80,14" fill="none" stroke="#0f172a" stroke-width="5" stroke-linecap="round"/>
        </svg>
        <span>Szprycha</span>
      </a>

      <button class="menu-toggle" aria-expanded="false" aria-label="Przełącz nawigację">
        Menu
      </button>

      <nav class="menu">
        <a href="#uslugi">Usługi</a>
        <a href="#cennik">Cennik</a>
        <a href="#kontakt">Kontakt</a>
      </nav>
    </header>
    <main>
      <section class="powitanie">
        <div class="powitanie-tekst">
          <span class="user-greeting">Cześć, <strong><?= htmlspecialchars($imie) ?></strong>!</span>
          <h1>Twoja pasja,<br>nasza precyzja.</h1>
          <p>
            Pracownia rowerowa w Bydgoszczy. Nie traktujemy rowerów taśmowo: każdy napęd myjemy ultradźwiękowo, a naciąg szprych badamy tensometrem.
          </p>
          <div class="powitanie-akcje">
            <a href="tel:500100100" class="btn btn-primary">Umów serwis: 500 100 100</a>
            <a href="#cennik" class="btn btn-secondary">Zobacz cennik</a>
          </div>
          <div class="powitanie-info">
            <div>
              <span>Godziny</span>
              <strong>Pn–Pt 9–18, Sob 10–14</strong>
            </div>
            <div>
              <span>Adres</span>
              <strong>ul. Rowerowa 1, Bydgoszcz</strong>
            </div>
          </div>
        </div>

        <div class="powitanie-rower">
          <svg viewBox="0 0 120 64" aria-hidden="true">
            <circle cx="28" cy="42" r="18" fill="none" stroke="#0f766e" stroke-width="4"/>
            <circle cx="92" cy="42" r="18" fill="none" stroke="#0f766e" stroke-width="4"/>
            <polyline points="28,42 48,14 80,14 92,42" fill="none" stroke="#0f172a" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="48,14 60,42 80,14" fill="none" stroke="#0f172a" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      </section>

      <section id="uslugi">
        <h2>Nasze usługi</h2>
        <div class="cards">
          <article class="card">
            <span class="card__number">01</span>
            <h3>Centrowanie kół</h3>
            <p>Precyzyjne wyważenie obręczy z mikrometryczną regulacją naciągu szprych na tensometrze cyfrowym.</p>
            <div class="card_price">od 50 zł</div>
          </article>

          <article class="card card--highlight">
            <span class="card__number">02 · Polecany</span>
            <h3>Przegląd Ogólny PRO</h3>
            <p>Kompletne czyszczenie ultradźwiękowe napędu, kasowanie luzów, smarowanie łożysk i regulacja.</p>
            <div class="card_price">od 250 zł</div>
          </article>

          <article class="card">
            <span class="card__number">03</span>
            <h3>Układ hamulcowy</h3>
            <p>Wymiana płynu hydraulicznego, montaż klocków i odtłuszczanie tarcz.</p>
            <div class="card_price">od 60 zł</div>
          </article>

          <article class="card">
            <span class="card__number">04</span>
            <h3>Regulacja przerzutek</h3>
            <p>Wyrównanie haka ramy miernikiem laserowym i precyzyjne strojenie indeksacji biegów.</p>
            <div class="card_price">od 50 zł</div>
          </article>
        </div>
      </section>

      <section id="cennik">
        <h2>Cennik stanowiskowy</h2>
        <div class="cennik-uklad">
          <div class="tabela-ramka">
            <table class="price-table">
              <thead>
                <tr>
                  <th class="service">Usługa</th>
                  <th>Czas</th>
                  <th class="num">Cena</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cennik as $usluga): ?>
                  <tr>
                    <td class="service"><?= htmlspecialchars($usluga['nazwa']) ?></td>
                    <td><?= htmlspecialchars($usluga['czas']) ?></td>
                    <td class="num"><?= $usluga['cena'] ?> zł</td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <figure class="wykres">
            <figcaption>Wykres cen</figcaption>
            <?php
            $najdrozsza = max(array_column($cennik, 'cena'));
            $wysokoscWiersza = 32;
            $wysokoscWykresu = count($cennik) * $wysokoscWiersza;
            ?>
            <svg viewBox="0 0 280 <?= $wysokoscWykresu ?>" width="100%" class="chart-svg"
                 role="img" aria-labelledby="wykres-tytul">
              <title id="wykres-tytul">Porównanie cen usług</title>
              <?php foreach ($cennik as $i => $usluga): ?>
                <?php $y = $i * $wysokoscWiersza; ?>
                <text x="0" y="<?= $y + 13 ?>" font-size="12" fill="#0f172a"><?= htmlspecialchars($usluga['nazwa']) ?> (<?= $usluga['cena'] ?> zł)</text>
                <rect x="0" y="<?= $y + 18 ?>" height="10" rx="2" fill="#0f766e"
                      width="<?= round($usluga['cena'] / $najdrozsza * 270) ?>" />
              <?php endforeach; ?>
            </svg>
          </figure>
        </div>
      </section>
    </main>

    <footer id="kontakt">
      <div class="kontener">
        <h2>Kontakt i godziny otwarcia</h2>
        <div class="kontakt-kolumny">
          <div>
            <span>Warsztat</span>
            <p>ul. Rowerowa 1, Bydgoszcz</p>
          </div>
          <div>
            <span>Godziny</span>
            <p>Pn–Pt 09:00–18:00<br>Sob 10:00–14:00</p>
          </div>
          <div>
            <span>Telefon i e-mail</span>
            <p><a href="tel:500100100">500 100 100</a></p>
            <p><a href="mailto:kontakt@szprycha.pl">kontakt@szprycha.pl</a></p>
          </div>
        </div>
        <p class="copyright">&copy; <?= $rok ?> <?= htmlspecialchars($firma) ?></p>
      </div>
    </footer>
  </body>
</html>