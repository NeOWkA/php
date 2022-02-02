<h2>Каталог</h2>

<div>
    <?php foreach ($catalog as $item): ?>
        <div>
            <?=$item['name']?><br>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <?php endforeach; ?>

</div>