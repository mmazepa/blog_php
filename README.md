# simple_PHP_CRUD

Prosty CRUD napisany w języku **PHP**. Styl wspierają pliki **Less**.

Baza danych: **MySQL** + **PDO**.

Przykładowy sposób uruchomienia:
* komenda `php -S localhost:8080` w folderze projektu
* wpisanie `localhost:8080/src/index.php` w przeglądarce

:information_source: **WAŻNE!**

Do połączenia z bazą danych obowiązkowy jest plik `credentials.php`.
Musi on znaleźć się pod ścieżką `src/partials/credentials.php` i musi
być wypełniony według następującego schematu:

```php
<?php
  $servername = "nazwa_serwera";
  $dbname = "nazwa_twojej_bazy";
  $username = "nazwa_uzytkownika";
  $password = "haslo_uzytkownika";
?>
```
