<?php 
$pages = ceil($pagination['count'] / $pagination['perPage']);

?>
<ul>
    <?php foreach($names as $name): ?>
        <li>
            <a href="name.php?<?php echo http_build_query(['name' => $name]) ?>">
                <?= e($name) ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<ul style="display: flex; gap: 10px; list-style-type:none;">
    <?php for($i = 1; $i <= $pages; $i++): ?>
        <li>
            <a class="button <?php if($i === $pagination['page']): ?> btn-active <?php endif ?>" href="char.php?<?php echo http_build_query(['char' => $char, 'page' => $i]) ?>">
                <?= $i ?>
            </a>
        </li>
    <?php endfor ?>
</ul>