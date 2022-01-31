<?php
$menu = [
    [
        'url' => '#',
        'name' => "Меню1"

    ],
    [
        'url' => '#',
        'name' => "Меню2"

    ],
    [
        'url' => '#',
        'name' => "Меню3"

    ],
    [
        'url' => '#',
        'name' => "Меню4"

    ]
];
?>
<ul>
    <?php foreach ($menu as $key => $value): ?>
	<li><a href='<?= $value['url'] ?>'><?=$value['name']?></a></li>
    <?php endforeach; ?>
</ul>
