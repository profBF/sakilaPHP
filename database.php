<?php
// FILE PHP DI CONNESSIONE AL DB: database.php
try {
    $conn = new mysqli("localhost", "root", "admin", "sakila");
} catch (Exception $e) {
    die("Errore durante la connessione al DB");
}
