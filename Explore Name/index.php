<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) $_GET['char'] ?? '';


$names = fetch_names_by_intial($char);
?>

<?php require __DIR__ . '/views/header.php'; ?>

<ul>
    <?php foreach($names as $name): ?>
        <li>
            <a href="name.php?<?php echo http_build_query(['name' => $name]) ?>">
                <?= $name ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>


<?php require __DIR__ . '/views/footer.php'; ?>