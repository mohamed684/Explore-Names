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

function fetch_name_entries(string $name): array {
    global $pdo;

    $stmt = $pdo->prepare('SELECT year, count FROM names WHERE name = :name ORDER BY year ASC');
    $stmt->bindValue('name', $name);
    $stmt->execute();

    $entries = $stmt->FetchAll(PDO::FETCH_ASSOC);

    return $entries;
}


function gen_names_overview(): array {
    global $pdo;

    $stmt = $pdo->prepare('SELECT DISTINCT name, SUM(`count`) AS sum FROM names GROUP BY name ORDER BY sum DESC LIMIT 10');
    $stmt->execute();

    $namesOverview = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $namesOverview;

}