<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/config/configuration.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/config/functions.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php foreach($pageConfig['cssFiles'] as $path_css): ?>
    <link rel="stylesheet" href="<?=$path_css?>">
    <?php endforeach; ?>
    <title><?=$pageConfig['title']?></title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-left">
                <a href="/" class="logo"></a>
                <div class="links">
                    <a href="#">Женщинам</a>
                    <a href="#">Мужчинам</a>
                    <a href="#">Детям</a>
                    <a href="#">Новинки</a>
                    <a href="#">О нас</a>
                </div>
            </div>
            <div class="header-right">
                <div class="hallo">
                    <div class="icon"></div>
                    <div class="hallo-content"></div>
                    <div class="hallo-exit">(выйти)</div>
                </div>
                <div class="basket-count">
                    <div class="icon"></div>
                    <div class="basket-count-content"></div>
                </div>
            </div>
        </div>