<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');

$page = (int) ($_GET['page'] ?? 1);

$perPage = 10;

$names = fetch_names_by_intial($char, $page, $perPage);
$count = count_names_by_initial($char);


render('char.php', [
    'names' => $names,
    'char' => $char,
    'pagination' => [
        'page' => $page,
        'perPage' => $perPage,
        'count' => $count
    ]
]);