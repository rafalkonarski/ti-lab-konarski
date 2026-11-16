# Szprycha – serwis rowerowy

Strona pracowni rowerowej z Bydgoszczy, wykonana na zaliczenie przedmiotu „Technologie internetowe”.

Autor: Rafał Konarski

## Wersja online

Statyczna wersja strony (HTML, CSS, JavaScript): https://rafalkonarski.github.io/ti-lab-konarski/

GitHub Pages nie uruchamia PHP, dlatego cennik z bazy danych i panel administracyjny działają tylko po uruchomieniu projektu lokalnie (instrukcja niżej).

## Zakres projektu

| Laboratorium | Temat | Pliki |
| --- | --- | --- |
| Lab 1 | HTML, CSS i GitHub | `index.html`, `style.css` |
| Lab 2 | JavaScript, PHP i SVG | `app.js`, `index.php` |
| Lab 3 | PHP, baza danych i mini-CMS | `baza.php`, `setup.php`, `login.php`, `auth.php`, `admin.php`, `wyloguj.php` |

## Uruchomienie lokalne

Wymagane jest PHP 8 z rozszerzeniem `pdo_sqlite` (dostępne od razu w GitHub Codespaces; w XAMPP trzeba je włączyć w `php.ini`).

```
php setup.php 'twoje-haslo'
php -S localhost:8000
```

- strona: http://localhost:8000
- panel administracyjny: http://localhost:8000/admin.php (login `admin`, hasło podane przy `setup.php`)

`setup.php` zakłada tabele, wstawia przykładowe usługi i tworzy konto administratora. Uruchamia się go tylko z terminala, a ponowne uruchomienie nie dubluje danych. Plik bazy `szprycha.sqlite` nie trafia do repozytorium (`.gitignore`).

## Bezpieczeństwo

- zapytania do bazy przez `prepare()` i `execute()` (ochrona przed SQL injection)
- `htmlspecialchars()` przy każdym wypisaniu danych (ochrona przed XSS)
- hasła zapisywane jako skrót `password_hash()`, sprawdzane przez `password_verify()`
- panel chroniony strażnikiem `auth.php`, nowy identyfikator sesji po zalogowaniu
- zmiany w bazie tylko metodą POST, z przekierowaniem po zapisie (wzorzec Post/Redirect/Get)

## Technologie

HTML5, CSS3 (Flexbox, Grid), JavaScript, PHP 8, SQLite (PDO), Bootstrap 5.3 (panel administracyjny)
