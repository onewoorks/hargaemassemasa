<?php
/**
 * Plugin Name: Live Gold Price
 * Version: 1.0.0
 * Description: This plugin will pull the live gold price captured from BullionByPost
 * Author: Irwan Ibrahim (onewoorks)
 * Namespace: Onewoorks
 */

namespace Onewoorks;
use Onewoorks\Apps\Controllers\Liveprice_Controller as LivePrice;
use Onewoorks\Apps\Controllers\Admin\MenuController as AdminMenu;

use Onewoorks\Apps\Models\LivePriceModel;
class Onewoorks {

    private $kiraan_harga;
    public function __construct() {
        spl_autoload_register( array( $this, 'autoload' ) );
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_enqueue_scripts', array($this,'pluginEnqueueStyle'));
        add_action( 'wp_enqueue_scripts', array($this,'pluginEnqueueScript'));

        $this->kiraan_harga = LivePriceModel::callLivePriceSetting();
    }

    public function autoload( $class ) {
        $prefix = 'Onewoorks\\';
        $base_dir = __DIR__ . '/';
        $len = strlen( $prefix );
        if ( strncmp( $prefix, $class, $len ) !== 0 ) {
            return;
        }
        $relative_class = substr( $class, $len );
        $file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';
        if ( file_exists( $file ) ) {
            require_once $file;
        }
    }

    public function init() {
        $lpc = new LivePrice();
        // new AdminMenu();å

        add_shortcode( 'livegoldprice_sc', array( $lpc, 'display' ));

        wp_enqueue_script( 'onewoorks-goldprice', plugins_url( 'web/assets/js/price.js', __FILE__ ), '','1.0.0',true);
        wp_localize_script(
            'onewoorks-goldprice',
            'onewoorks_goldprice_object',
            array(
                'param' => $this->kiraan_harga,
            )
        );
    }

    function pluginEnqueueStyle() {
        wp_enqueue_style(
            'onewoorks-goldprice',
            plugins_url( 'web/assets/css/main.css', __FILE__ ),
            array(),
            '1.0.0',
            'all'
        );
    }

    public function pluginEnqueueScript() {
        wp_enqueue_script(
            'onewoorks-goldprice',
            plugins_url( 'web/assets/js/price.js', __FILE__ ),
            [],
            '1.0.0',
            true
        );
    }

    public static function activate() {
        // Activation code goes here
    }

    public static function deactivate() {
        // Deactivation code goes here
    }

}

new Onewoorks();

register_activation_hook( __FILE__, array( 'Onewoorks\Onewoorks', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Onewoorks\Onewoorks', 'deactivate' ) );