<?php

    function render_template($path, $data) {
        if (!is_readable($path)) {
            return 'Не удаётся прочитать файл';
        }

        ob_start();
        extract($data);
        require $path;

        return ob_get_clean();
    }


    function filter_text($str) {
        return htmlspecialchars($str);
    }    


    function format_cost($cost) {
        $num = ceil($cost);

        if ($num > 1000) {
            $num = number_format ($num, 0 , " " , " ");
        }

        return $num .= " ₽";
    }