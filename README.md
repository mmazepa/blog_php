# simple_PHP_CRUD

Niniejszy projekt to **blog** napisany w języku **PHP**.
Styl wspierają pliki **Less** oraz **Bootstrap**.
Drobne wsparcie skryptowe - **JavaScript**.

Baza danych: **MySQL** + **PDO** (kompletny **CRUD**).

Przykładowy sposób uruchomienia:
* komenda `php -S localhost:8080` w folderze projektu
* wpisanie `localhost:8080/src/index.php` w przeglądarce

:information_source: **WAŻNE!**

Do połączenia z bazą danych obowiązkowy jest plik `credentials.php`.
Musi on znaleźć się pod ścieżką `src/partials/credentials.php` i musi
być wypełniony według następującego schematu:

```php
<?php
  $db_servername = "nazwa_serwera";
  $db_name = "nazwa_twojej_bazy";
  $db_username = "nazwa_uzytkownika";
  $db_password = "haslo_uzytkownika";
?>
```
