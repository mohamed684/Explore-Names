<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');

if($char > 1) {
    $char = $char[0];
}
$char = strtoupper($char);
$alphabet = gen_alphabet();

if(!in_array($char, $alphabet)) {
    header('Location: index.php');
    die();
}

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