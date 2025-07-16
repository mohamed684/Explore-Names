<?php

require __DIR__ . '/inc/all.inc.php';


$stmt = $pdo->prepare('SELECT * FROM names');
$stmt->execute();


?>

<?php require __DIR__ . '/views/header.php'; ?>


<?php require __DIR__ . '/views/footer.php'; ?>