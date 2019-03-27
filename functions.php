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
