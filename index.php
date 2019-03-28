<?php

    require_once('functions.php');

    $is_auth = rand(0, 1);

    $user_name = 'Полковник'; 
    $user_avatar = 'img/user.jpg';

    $categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

    function cut_text($text, $num_letters) {
        $num = mb_strlen($text);

        if ($num > $num_letters) {
            $text = mb_substr($text, 0, $num_letters);
            $text .= "…";
        }

        return $text;
    }

    function format_cost($cost) {
        $num = ceil($cost);

        if ($num > 1000) {
            $num = number_format ($num, 0 , " " , " ");
        }

        return $num .= " ₽";
    }

            
    // Создаем двумерный массив

    $goods_list = [
        [
            'name' => '2014 Rossignol District Snowboard',
            'category' => $categories[0],
            'cost' => 999,
            'url' => 'img/lot-1.jpg'
        ],
        [
            'name' => 'DC Ply Mens 2016/2017 Snowboard',
            'category' => $categories[0],
            'cost' => 159999,
            'url' => 'img/lot-2.jpg'
        ],
        [
            'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
            'category' => $categories[1],
            'cost' => 8000,
            'url' => 'img/lot-3.jpg'
        ],                    
        [
            'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
            'category' => $categories[2],
            'cost' => 10999,
            'url' => 'img/lot-4.jpg'
        ],
        [
            'name' => 'Куртка для сноуборда DC Mutiny Charocal',
            'category' => $categories[3],
            'cost' => 7500,
            'url' => 'img/lot-5.jpg'
        ],
        [
            'name' => 'Маска Oakley Сanopy',
            'category' => $categories[5],
            'cost' => 5400,
            'url' => 'img/lot-6.jpg'
        ]
    ];

    //Задание 3-2

    date_default_timezone_set("Europe/Moscow");
    
    $today = date('d.m.Y H:i');
    $curMinutes = date('i');
    $tomorrow = date('d.m.Y 00:00', strtotime($today."+1 day"));

    $distance = strtotime($tomorrow) - strtotime($today);

    $hours_remaining = floor($distance/3600);
    $minutes_remaining = (60 - $curMinutes) < 10 ? "0".(60 - $curMinutes) : 60 - $curMinutes;

    $timer = $hours_remaining.":".$minutes_remaining;


    $page_content = render_template('templates/index.php', [
        'categories' => $categories,
        'goods_list' => $goods_list,
        'timer' => $timer
    
    ]);
    
    $layout_content = render_template('templates/layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'Yeticave - главная',
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar
    
    ]);

print($layout_content);

