<?php
    $dsn = 'mysql:host=localhost;dbname=pokemon';
    $username = 'root';
    $password = 'Password';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>