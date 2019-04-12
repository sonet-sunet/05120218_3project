<?php
function d($ar){
    echo "<pre>";
    print_r( $ar );
    echo "</pre>";
}
    session_start();
    $response = [
        'basket' => [
            'count' => 0
        ]
    ];

    if (isset($_GET['product_id'])){
        if (!isset($_SESSION['basket'])){
            $_SESSION['basket'] = [];
        }
    

        $is_find = false;
        foreach($_SESSION['basket'] as $key=>$basketItem){
            if ($basketItem['product_id'] == $_GET['product_id']){
                $_SESSION['basket'][$key]['count']++;
                $is_find = true;
            }
        }


        if($is_find == false){
            $_SESSION['basket'][] = [
                'product_id' => $_GET['product_id'],
                'count' => 1
            ];
        }
    }

    if (isset($_SESSION['basket'])){
        foreach( $_SESSION['basket'] as $basketItem){
            $response['basket']['count']+=$basketItem['count'];
        }
    }
    echo json_encode($response);

    echo json_encode($response);
