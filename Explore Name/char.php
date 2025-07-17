<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');


$names = fetch_names_by_intial($char);

render('char.php', [
    'names' => $names
]);