<?php

namespace Onewoorks\Apps\Controllers;

use ErrorException;

class View
{
    public static function renderPage($file, $data = []){
        ob_start();
        $path =  WP_PLUGIN_DIR .  '/livegoldprice/web/' . strtolower($file) . '.php';
        include($path);
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    }
}