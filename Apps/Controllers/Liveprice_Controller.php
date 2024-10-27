<?php

namespace Onewoorks\Apps\Controllers;
use Onewoorks\Apps\Controllers\View;
use Onewoorks\Apps\Views\LivePrice;

class Liveprice_Controller extends Controller {

    public function __construct(){

    }
    public function display( $atts, $content = null ) {
        $args = [
            'title' => 'harga buy back'
        ];
        return View::renderPage('liveprice', $args);
    }
}