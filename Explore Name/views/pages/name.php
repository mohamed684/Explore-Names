
<h1>
    Statistics For The Name: <?= $name ?>
</h1>

<?php if(empty($entries)): ?>
    <h5 style="color: red">
        We could not find any entires in our system!
    </h5>
<?php else: ?>

<table>
    <thead>
        <tr>
            <th>
                Year
            </th>
            <th>
                Number Of Babies Born
            </th>
        </tr>
        <?php foreach($entries as $entry): ?>
            <tr>
                <td>
                    <?= e($entry['year']) ?>
                </td>
                <td>
                    <?= e($entry['count']) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </thead>
</table>

<?php endif ?>
