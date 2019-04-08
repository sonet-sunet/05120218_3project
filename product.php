<?php
    $pageConfig = [
        'title' => 'Товар',
        'cssFiles' => [
            '/css/style.css',
            '/css/product.css'
        ],
        'jsFiles' => [
            '/js/script.js',
            '/js/product.js'
        ],
    ];
    include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');

    $template = [
        'product' => [],
        'catalog'=>[]
    ];

    if (isset($_GET['id'])){
        $sql = "SELECT * FROM products WHERE id = {$_GET['id']}";
        $result = mysqli_query($db, $sql);
        $template['product'] = mysqli_fetch_assoc($result);

        $sql_product_catalog = "SELECT * FROM product_catalog WHERE id = {$_GET['id']}";
        $result_product_catalog = mysqli_query($db, $sql_product_catalog);
        $catalog_id = mysqli_fetch_assoc($result_product_catalog)['catalog_id'];

        $sql_catalog = "SELECT * FROM catalogs WHERE id = {$catalog_id}";
        $result_catalog = mysqli_query($db, $sql_catalog);
        $template['catalog'] = mysqli_fetch_assoc($result_catalog);

        // d($template);

    }else{
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: /catalog.php');
    }
?>

    <div class="path">Кому/Какой товар</div>
    <?php if (!empty($template['product'])): ?>
        <div class="product">
            <div class="product_photo">
                <div style="background: url('<?=$template['product']['img_src']?>') center center / contain no-repeat;"></div>
            </div>
            <div class="product_main_info">
                <h3><?=$template['product']['name']?></h3>
                <div class="sku">Артикул: <?=$template['product']['sku']?></div>
                <div class="price" style="margin: 15px 0;"><i><?=$template['product']['price']?> руб.</i></div>
                <p><?=$template['product']['description']?></p>
                <button data-product-id='<?=$template['product']['id']?>' class='add_to_basket'>Добавить в корзину</button>
            </div>
        </div>
    <?php else: ?>
        <h2>Такого товара нет</h2>
    <?php endif; ?>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?>