<?php

require __DIR__ . '/inc/all.inc.php';

$namesOverview = gen_names_overview();

render('index.php', [
    'namesOverview' => $namesOverview
]);