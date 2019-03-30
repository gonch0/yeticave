<?php

    require_once('functions.php');
    require_once('data.php');
    
    $is_auth = rand(0, 1);

    $user_name = 'Полковник'; 
    $user_avatar = 'img/user.jpg';


    function cut_text($text, $num_letters) {
        $num = mb_strlen($text);

        if ($num > $num_letters) {
            $text = mb_substr($text, 0, $num_letters);
            $text .= "…";
        }

        return $text;
    }



            
    // Создаем двумерный массив

    

    //Задание 3-2

    date_default_timezone_set("Europe/Moscow");
    
    $today = date('d.m.Y H:i');
    $curMinutes = date('i');
    $tomorrow = date('d.m.Y 00:00', strtotime($today."+1 day"));

    $distance = strtotime($tomorrow) - strtotime($today);

    $hours_remaining = floor($distance/3600) < 10 ? "0".floor($distance/3600) : floor($distance/3600);
    $minutes_remaining = (60 - $curMinutes) < 10 ? "0".(60 - $curMinutes) : 60 - $curMinutes;

    $timer = $hours_remaining.":".$minutes_remaining;


    //Задание 4-1

    





    // Вывод
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

