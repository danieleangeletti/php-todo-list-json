<?php

$index = intval($_POST["index"]);

$all_tasks = file_get_contents("db/todo.json");

$all_tasks = json_decode($all_tasks, true);

array_splice($all_tasks, $index, 1);

file_put_contents("db/todo.json", json_encode($all_tasks));

echo json_encode([
    "message" => "OK",
    "code" => 200,
]);