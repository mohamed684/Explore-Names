<?php

require __DIR__ . '/inc/all.inc.php';

$name = (string) $_GET['name'] ?? '';

if(empty($name)) {
    header('Location: index.php');
    die();
}


$entries = fetch_name_entries($name);

render('name.php', [
    'entries' => $entries,
    'name' => $name,
    'char' => $name[0]
]);