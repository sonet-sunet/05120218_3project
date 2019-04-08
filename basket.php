<?php
    $pageConfig=[
        'title'=>'Корзина',
        'cssFiles'=>[
            '/css/style.css'
        ],
        'jsFiles'=>[
            '/js/basket.js'
        ]
    ];

    include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');

    session_start();

    $template = [
        'products' => []
    ];

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    foreach($_SESSION['basket'] as $basketItem){
        $sql = "SELECT * FROM products WHERE id  = {$basketItem['product_id']}";
        $result = mysqli_query($db, $sql);
        $product = mysqli_fetch_assoc($result);
        $product['count'] = $basketItem['count'];
        $product['final_price'] = $basketItem['count']*$product['price'];
        $template['products'][]=$product;
    }
?>
        <div class="basket">
            <h2>Ваша корзина</h2>
            <p>Товары резервируются на ограниченное время</p>
            <div class="basket-heading">
                <div class="basket-heading-left">
                    <div>фото</div>
                    <div>наименование</div>
                </div>
                <div class="basket-heading-right">
                    <div>размер</div>
                    <div>колличество</div>
                    <div>стоимость</div>
                    <div>удалить</div>
                </div>
            </div>
            <div class="basket-content">
                <?php if (!empty($template['products'])): ?>
                <?php foreach($template['products'] as $productItem): ?>
                <div class="basket-box-item">
                    <div class="left">
                        <div class="basket-box-item-photo">
                            <img src="<?=$productItem['img_src']?>">
                        </div>
                        <div class="name-sku">
                            <div class="basket-box-item-name"><?=$productItem['name']?></div>
                            <div class="basket-box-item-sku"><?=$productItem['sku']?></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="basket-box-item-count"><?=$productItem['count']?></div>
                        <div class="basket-box-item-price"><?=$productItem['final_price']?></div>
                        <div class="delete">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php else: ?>
                    <h3>Корзина пуста</h3>
                <?php endif; ?>
            </div>
        </div>
<?php
    include($_SERVER['DOCUMENT-ROOT'].'/parts/footer.php');
?>
    
