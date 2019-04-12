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
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Noto+Serif:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title><?=$pageConfig['title']?></title>
    <?php foreach($pageConfig['cssFiles'] as $path_css): ?>
        <link rel="stylesheet" href="<?=$path_css?>">
    <?php endforeach;?>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="header_start">
                <a href="/" class="logo"></a>
                <div class="main_menu">
                    <a href="/catalog.php?section=girl">Женщинам</a>
                    <a href="/catalog.php?section=man">Мужчинам</a>
                    <a href="/catalog.php?section=child">Детям</a>
                    <a href="#">Новинки</a>
                    <a href="#">О нас</a>
                </div>
            </div>
            <div class="header_end">
                <div class="account">
                    <div class="pic"></div>
                    <a href="#">Войти</a>
                </div>
                <div class="basket">
                    <div class="pic"></div>
                    <a href="/basket.php">Корзина(<span>0</span>)</a>
                </div>
            </div>
        </div>
