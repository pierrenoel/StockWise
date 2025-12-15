<?php

function template($file, $args = [])
{
    $path = BASE_PATH . "/views/" . $file;
    
    if (!file_exists($path)) {
        return "Vue introuvable : $path";
    }

    if (!empty($args)) extract($args);

    ob_start();
    include $path;
    return ob_get_clean();
}
