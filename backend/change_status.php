<?php

$index = intval($_POST['index']);

// Recuperare tutti i todo attualmente esistenti (con file_get_contents)
$all_tasks = file_get_contents("db/todo.json");

// Trasformare la stringa JSON corrispondente ai todo attualmente esistenti in un array di array associativi
$all_tasks = json_decode($all_tasks, true);

// Manipolare i dati
$all_tasks[$index]["done"] = !$all_tasks[$index]["done"];

// Scrivere la stringa JSON nel file todo.json
file_put_contents("db/todo.json", json_encode($all_tasks));

echo json_encode([
    "message" => "OK",
    "code" => 200,
]);

