<?php
if (!isset($_POST["task"])) {
    echo json_encode([
        "message" => "Fail: no task!",
        "code" => 400
    ]);
    return;
}

if (isset($_POST["task"]) && $_POST["task"] == "") {
    echo json_encode([
        "message" => "Fail: empty task!",
        "code" => 400
    ]);
    return;
}
;

// Recuperare tutti i todo attualmente esistenti (con file_get_contents)
$all_tasks = file_get_contents("db/todo.json");

// Trasformare la stringa JSON corrispondente ai todo attualmente esistenti in un array di array associativi
$all_tasks = json_decode($all_tasks, true);

// Aggiungere nell'array il nuovo todo
$new_task = [
    "todo" => $_POST['task'],
    "done" => false,
];

$all_tasks[] = $new_task;

// Ri-trasformare l'array in una stringa JSON
$all_tasks_with_new_one = json_encode($all_tasks);

// Scrivere la stringa JSON nel file todo.json
file_put_contents("db/todo.json", $all_tasks_with_new_one);

echo json_encode([
    "message" => "OK",
    "code" => 200,
]);