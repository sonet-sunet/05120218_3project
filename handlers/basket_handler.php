<?php

    session_start();

    $response = [
        'basket' => [
            'count' => 0
        ]
    ];

    //Добавление в корзину
    if (isset($_GET['product_id'])){
        if (!isset($_SESSION['basket'])){
            $_SESSION['basket'] = [];
        }
    

        $is_find = false;

        foreach($_SESSION['basket'] as $key => $basketItem){
            if ($basketItem['product_id'] == $_GET['product_id']){
                $_SESSION['basket'][$key]['count']++;
                $is_find = true;
            }
        };

        if (!$is_find){
            $_SESSION['basket'][] = [
                'product_id' => $_GET['product_id'],
                'count' => 1
            ];
        }
    }
    //Подсчёт товаров
    if (isset($_SESSION['basket'])){
        foreach($_SESSION['basket'] as $basketItem){
            $response['basket']['count'] += $basketItem['count'];
        };
    }

    echo json_encode($response);
    // if (isset($_SESSION['count'])){
    //     $_SESSION['count']++;
    // }else{
    //     $_SESSION['count'] = 1;
    // }

    // echo $_SESSION['count'];