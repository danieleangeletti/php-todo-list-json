<?php
// Recupero il contenuto del file contenente i dati sotto forma di stringa
$my_str = file_get_contents('db/todo.json');

// Trasformo la stringa in una struttura dati utilizzabile in PHP
$todos = json_decode($my_str, true);

// Dico al client che la risposta contiene un json
header('Content-Type: application/json');

// Rispondo con il json preso dal file
echo json_encode($todos);