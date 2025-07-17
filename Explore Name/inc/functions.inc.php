<?php

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


function gen_alphabet(): array {
    $a = ord('A');
    $z = ord('Z');

    $alphabet = [];

    for($i = $a; $i <= $z; $i++) {
        $alphabet[] = chr($i);
    }

    return $alphabet;
}


function render($view, $params) {
    extract($params);

    ob_start();
    require __DIR__ . '/../views/pages/' . $view;
    $content = ob_get_clean();

    require __DIR__ . '/../views/layouts/base.php';
}