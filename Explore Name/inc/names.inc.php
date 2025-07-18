<?php
declare(strict_types=1);

function fetch_names_by_intial(string $char, int $page = 1, int $perPage = 10): array {
    global $pdo;

    $offset = ($page - 1) * $perPage;

    $stmt = $pdo->prepare('SELECT DISTINCT name FROM names WHERE name LIKE :expr ORDER BY name ASC LIMIT :limit OFFSET :offset');
    $stmt->bindValue('expr', "{$char}%");
    $stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $names = array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'name');

    return $names;
}


function count_names_by_initial(string $char): int {
    global $pdo;

    $stmt = $pdo->prepare('SELECT COUNT(DISTINCT `name`) AS count FROM names WHERE name LIKE :expre');
    $stmt->bindValue(':expre', "{$char}%");
    $stmt->execute();

    $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

    return $count;
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