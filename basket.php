<?php
    
$pageConfig = [
    'title' => 'Корзина',
    'cssFiles' => [
        'css/style.css',
        '/css/basket.css'
    ],
    'jsFiles' => [
        'js/script.js'
    ],
];
include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');

session_start();

$template = [
    'products' => []
];

echo"<pre>";
print_r($_SESSION);
echo"</pre>";


foreach ($_SESSION['basket'] as $basketItem){
    
    $sql = "SELECT * FROM products WHERE id = {$basketItem['product_id']}";
    $result = mysqli_query($db, $sql);

    $product = mysqli_fetch_assoc($result);
    $product['count'] = $basketItem['count'];
    $product['final_price'] = $basketItem['count'] * $product['price'];
    $template['products'][] = $product;
}
?>
<div class="head">
    <h2>Ваша корзина</h2>
    <p><i>Товары резервируются на ограниченное время</i></p>
</div>
<div class='basket_box'>
    <div class="properties">
        <div class="properties_start">
            <p>Фото</p>
            <p>Наименование</p>
        </div>
        <div class="properties_end">
            <p>Размер</p>
            <p>Количество</p>
            <p>Стоимость</p>
            <p>Удалить</p>
        </div>
    </div>
    <?php if (!empty($template['products'])): ?>
        <?php foreach($template['products'] as $productItem): ?>
            <div class="basket_box_items">
                <div class="basket_box_items_info_start">
                    <div class="img_src" style='background: url("<?=$productItem['img_src']?>") center center / contain no-repeat;'></div>
                    <div class="basket_box_items_info_start_main_info">
                        <h3 class="name"><?=$productItem['name']?></h3>
                        <div class="sku" style='color: grey;'><?=$productItem['sku']?></div>
                    </div>
                </div>
                <div class="basket_box_items_info_end">
                    <div class="size"> 39 </div> <!-- <?=$productItem['size']?> -->
                    <div class="count"><?=$productItem['count']?> шт</div>
                    <div class="price"><?=$productItem['price']?>руб.</div>
                    <div class="delete"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- посчитать для каждого и вывести итог  -->
        <div class="final_price">
            Итого: <span><?=$product['final_price']?></span>
        </div>
    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif; ?>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?>