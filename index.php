<?php
require_once('helpers.php');

$is_auth = rand(0, 1);

$user_name = 'Артём';

$title = 'Yeti-cave';

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$goods = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10999,
        'img' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 159999,
        'img' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'img' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'img' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'img' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'img' => 'img/lot-6.jpg'
    ]
];

function format_price(float $old_price) {
    $new_price = ceil($old_price);

    $new_price = $new_price < 1000 ? $new_price . ' ₽' : number_format($new_price, 0, '', ' ') . ' ₽';

    return $new_price;
}

$page_content = include_template('main.php',
    [
        'categories' => $categories,
        'goods' => $goods
    ]
);

$layout_content = include_template('layout.php',
    [
        'content' => $page_content,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'title' => $title,
        'categories' => $categories
    ]
);

print($layout_content);
?>
