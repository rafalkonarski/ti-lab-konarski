<?php
$firma = 'Szprycha';
$rok = date('2026');

$cennik = [
  ['nazwa' => 'Centrowanie koła', 'cena' => 50],
  ['nazwa' => 'Przegląd ogólny', 'cena' => 250],
  ['nazwa' => 'Regulacja hamulców', 'cena' => 30],
  ['nazwa' => 'Regulacja przerzutek', 'cena' => 50],
  ['nazwa' => 'Dodatkowa: wymiana dętki', 'cena' => 30]
];

?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <title>Szprycha - serwis rowerowy</title>
    <script src="app.js" defer></script>
  </head>
  <body>
    <header class="site-header">
      <a class="logo" href="#">
      <svg viewBox="0 0 120 64" width="72" height="38" role="img" aria-labelledby="logo-tytul">
        <title id="logo-tytul">Szprycha</title>
        <!-- Koła -->
        <circle cx="28" cy="42" r="18" fill="none" stroke="#4426FF" stroke-width="5"/>
        <circle cx="92" cy="42" r="18" fill="none" stroke="#4426FF" stroke-width="5"/>
        <!-- Rama roweru -->
        <polyline points="28,42 48,14 80,14 92,42" fill="none" stroke="#1D1A2F" stroke-width="5"/>
        <polyline points="48,14 60,42 80,14" fill="none" stroke="#1D1A2F" stroke-width="5"/>
      </svg>
      <span>Szprycha</span>
      </a>
      <button class="menu-toggle" aria-label="false">Menu</button>
      <nav class="menu">
        <a href="#uslugi">Usługi</a>
        <a href="#cennik">Cennik</a>
        <a href="#kontakt">Kontakt</a>
      </nav>
    </header>
    <main>
      <section id="uslugi">
        <h2>Nasze usługi!</h2>
        <div class="cards">
          <article class="card">
            <h3>Centrowanie koła</h3>
            <p>
              Precyzyjne prostowanie obręczy, likwidacja bicia bocznego i
              pionowego oraz kontrola naciągu szprych na tensometrze.
            </p>
            <p class="card_price">od 50 zł</p>
          </article>
          <article class="card card--highlighted">
            <h3>Przeglad ogólny</h3>
            <p>
              Kompleksowe sprawdzenie bezpieczeństwa, regulacja hamulców i
              napędu, kasowanie luzów oraz smarowanie kluczowych elementów. 
            </p>
            <p>Najczęściej wykonywana usługa w naszej pracowni.</p>
            <p class="card_price">od 250 zł</p>
          </article>
          <article class="card">
            <h3>Regulacja hamulców</h3>
            <p>
              Ustawienie klocków lub zacisków tarczowych, kasowanie luzu na
              klamkach oraz ewentualna wymiana wyciągniętej linki.
            </p>
            <p class="card_price">od 30 zł</p>
          </article>
          <article class="card">
            <h3>Regulacja przerzutek</h3>
            <p>
              Precyzyjne ustawienie zakresów i indeksacji biegów, prostowanie
              haka przerzutki oraz czyszczenie i naoliwienie wózków.
            </p>
            <p class="card_price">od 50 zł</p>
          </article>
        </div>
      </section>
      <section id="cennik">
        <h2>Cennik</h2>
        <table class="price-table">
          <thead>
            <tr>
              <th class="service">Usługa</th>
              <th class="num">Cena</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cennik as $usluga) : ?>
              <tr>
                <td> <?= htmlspecialchars($usluga['nazwa']) ?></td>
                <td> <?= $usluga['cena'] ?> zł </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </main>
    <footer id="kontakt">
      <h3>Kontakt</h3>
      <p>Pracownia rowerowa Szprycha</p>
      <p>ul. Rowerowa 1, 85-601 Bydgoszcz</p>
      <p><a href="tel:500100100">tel. 500-100-100</a></p>
      <p><a href="mailto:kontakt@szprycha.pl">kontakt@szprycha.pl</a></p>
      <p>&copy; <?= $rok ?> <?= $firma ?></p>
    </footer>
  </body>
</html>
