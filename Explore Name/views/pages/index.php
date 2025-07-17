<h1>
    Most Common Names:
</h1>

<ol>
    <?php foreach($namesOverview as $row): ?>
        <li>
            <a href="name.php?<?php echo http_build_query(['name' => $row['name']]) ?>">
                <?= $row['name'] ?>
            </a>
        </li>
    <?php endforeach ?>
</ol>
