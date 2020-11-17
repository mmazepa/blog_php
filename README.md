# Blog in PHP

![HTML](https://img.shields.io/badge/HTML-HTML5-blue)
![CSS](https://img.shields.io/badge/CSS-CSS3+Less-blue)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-3.4.0-blue)
![PHP](https://img.shields.io/badge/PHP-7.2.24-blue)

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)

## General Info

This web application is a blog template.

**Features:**
* retrieving input data from the user,
* form validation,
* CRUD (create, read, update and delete) to every table,
* registration,
* login (under construction...).

## Technologies

* pages made with **PHP** and **HTML5**,
* stylesheets made with **CSS3** and supported by **Less** and **Bootstrap**,
* scripts written in **JavaScript** according to the **ES6** standard,
* DBMS used in this project is **MySQL**,
* database connection is supported by **PDO**.

## Setup

To run this project:

```
$ cd blog_php
$ php -S localhost:8080
```

and then go to [localhost:8080/src/index.php](https://localhost:8080/src/index.php "Blog in PHP Homepage") in your browser.

:information_source: **IMPORTANT!**

To successfully connect with the database you need `credentials.php` file. It needs to be under `src/partials/credentials.php` location and filled as follows:

```php
<?php
  $db_servername = "your_server_name";
  $db_name = "your_database_name";
  $db_username = "your_username";
  $db_password = "your_password";
?>
```

Note that the `credentials.php` file is not included.
