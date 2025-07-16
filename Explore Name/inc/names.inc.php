<?php
declare(strict_types=1);

function fetch_names_by_intial(string $char): array {
    global $pdo;

    if($char > 1) {
        $char = $char[0];
    }
    $char = strtoupper($char);
    
    $stmt = $pdo->prepare('SELECT DISTINCT name FROM names WHERE name LIKE :expr ORDER BY name ASC');
    $stmt->bindValue('expr', "{$char}%");
    $stmt->execute();

    $names = array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'name');

    return $names;
}