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
  <section class="powitanie-box">
        <div class="powitanie-tekst">
          <span class="user-greeting">Cześć, <strong><?= htmlspecialchars($imie) ?></strong>!</span>
          <h1>Twoja pasja, nasza precyzja.<br>Serwis rowerowy na najwyższym poziomie.</h1>
          <p>
            Nie traktujemy rowerów taśmowo. Niezależnie czy przygotowujesz gravela na ultramaraton, czy szosę na szybką ustawkę — każdy napęd myjemy ultradźwiękowo, a naciąg szprych badamy tensometrycznie.
          </p>
          <div class="powitanie-akcje">
            <a href="tel:500100100" class="btn btn-primary">Umów serwis: 500 100 100</a>
            <a href="#cennik" class="btn btn-secondary">Zobacz cennik &darr;</a>
          </div>
        </div>

        <div class="powitanie-rower">
          <svg viewBox="0 0 120 64" width="100%" height="auto" role="img" aria-label="Rower serwisowy">
            <circle cx="28" cy="42" r="18" fill="none" stroke="#0f766e" stroke-width="5"/>
            <circle cx="92" cy="42" r="18" fill="none" stroke="#0f766e" stroke-width="5"/>
            <polyline points="28,42 48,14 80,14 92,42" fill="none" stroke="#0f172a" stroke-width="5" stroke-linecap="round"/>
            <polyline points="48,14 60,42 80,14" fill="none" stroke="#0f172a" stroke-width="5" stroke-linecap="round"/>
          </svg>
        </div>
    </section>
      <section id="uslugi">
        <h2>Nasze usługi</h2>
        <div class="cards">
          <article class="card">
            <h3>Centrowanie kół</h3>
            <p>Precyzyjne wyważenie obręczy z mikrometryczną regulacją naciągu szprych na tensometrze cyfrowym.</p>
            <div class="card_price">od 50 zł</div>
          </article>

          <article class="card card--highlighted">
            <h3>Przegląd Ogólny PRO</h3>
            <p>Kompletne czyszczenie ultradźwiękowe napędu, kasowanie luzów, smarowanie łożysk i regulacja.</p>
            <div class="card_price">od 250 zł</div>
          </article>

          <article class="card">
            <h3>Układ hamulcowy</h3>
            <p>Wymiana płynu hydraulicznego, montaż klocków i odtłuszczanie tarcz.</p>
            <div class="card_price">od 60 zł</div>
          </article>

          <article class="card">
            <h3>Regulacja przerzutek</h3>
            <p>Wyrównanie haka ramy miernikiem laserowym i precyzyjne strojenie indeksacji biegów.</p>
            <div class="card_price">od 50 zł</div>
          </article>
        </div>
      </section>

      <section id="cennik">
        <h2>Cennik stanowiskowy</h2>
        <table class="price-table">
          <thead>
            <tr>
              <th class="service">Zakres prac serwisowych</th>
              <th>Szacowany czas</th>
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
      </section>
      <section id="bonus-wykres">
        <h2>Wykres cen</h2>
        <svg viewBox="0 0 280 145" width="100%" class="chart-svg">
          <text x="0" y="12" font-size="11" fill="#0f172a">Centrowanie kół (50 zł)</text>
          <rect x="0" y="16" width="50" height="9" fill="#0f766e" rx="2" />

          <text x="0" y="39" font-size="11" fill="#0f172a">Przegląd Ogólny PRO (250 zł)</text>
          <rect x="0" y="43" width="250" height="9" fill="#0f766e" rx="2" />

          <text x="0" y="66" font-size="11" fill="#0f172a">Układ hamulcowy (60 zł)</text>
          <rect x="0" y="70" width="60" height="9" fill="#0f766e" rx="2" />

          <text x="0" y="93" font-size="11" fill="#0f172a">Regulacja przerzutek (50 zł)</text>
          <rect x="0" y="97" width="50" height="9" fill="#0f766e" rx="2" />

          <text x="0" y="120" font-size="11" fill="#0f172a">Wymiana dętki (40 zł)</text>
          <rect x="0" y="124" width="40" height="9" fill="#0f766e" rx="2" />
        </svg>
      </section>
    <footer id="kontakt">
      <h3>Kontakt i godziny otwarcia</h3>
      <p>Warsztat: ul. Rowerowa 1, Bydgoszcz</p>
      <p>Godziny otwarcia: Pn–Pt 09:00 – 18:00, Sob 10:00 – 14:00</p>
      <p>Telefon: <a href="tel:500100100">500 100 100</a></p>
      <p>E-mail: <a href="mailto:kontakt@szprycha.pl">kontakt@szprycha.pl</a></p>
      <p style="margin-top: 14px; font-size: 0.85rem; color: #64748b;">
        &copy; <?= $rok ?> <?= htmlspecialchars($firma) ?>
      </p>
    </footer>
  </body>
</html>