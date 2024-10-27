<?php 

namespace Onewoorks\Apps\Models;

class LivePriceModel {
    // Define your model properties and methods here
	

	public static function callLivePriceSetting(){
		return get_option( 'live_gold_price_setting_option_name' );
	}

	public function getShopCalculation(){
		return [
			"formula" => "a"
		];
	}
}

