<?php
    $pageConfig = [
        'title' => 'Каталог',
        'cssFiles' => [
            '/css/style.css',
            '/css/catalog.css'
        ],
        'jsFiles' => [
            '/js/script.js',
            '/js/catalog.js'
        ],
    ];

    $template = [
        'section' => (isset($_GET['section'])) ? $_GET['section'] : 'man'
    ];

    include($_SERVER['DOCUMENT_ROOT'].'/parts/header.php');
?>

    <div class="catalog" data-section='<?=$template['section']?>'>
        <div class="catalog_filters"></div>
        <div class="catalog_products"></div>
        <div class="catalog_pagination"></div>

    </div>
<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/parts/footer.php');
?>