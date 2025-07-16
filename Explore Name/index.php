<?php

require __DIR__ . '/inc/all.inc.php';


$stmt = $pdo->prepare('SELECT * FROM names');
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($results)

?>

<?php require __DIR__ . '/views/header.php'; ?>


<?php require __DIR__ . '/views/footer.php'; ?>