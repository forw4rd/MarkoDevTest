<?php
/**
 * Created by PhpStorm.
 * User: mj
 * Date: 27.1.2018.
 * Time: 15:36
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class MarkoWidget extends \WP_Widget
{

	protected  $bc;

	function register() {
		parent::_register(); // TODO: Change the autogenerated stub

	}

	function __construct()
	{
		$this->bc=new BaseController();
		parent::__construct(
			'MarkoWidget',
			__('MarkoDevTest Kalkulator', 'MarkoWidget_domain'),
			[ 'description' => __( 'Kalkulator', 'MarkoWidget_domain' ),]
		);
	}

	// Creating widget front-end

	public function widget( $args, $instance )
	{
		wp_enqueue_style( 'markowidgetstyle', $this->bc->plugin_url . 'assets/widget.css');
		wp_enqueue_script( 'markowidgetscript', $this->bc->plugin_url . 'assets/widget.js');
		wp_enqueue_style( 'bootstrapstyle', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
		wp_enqueue_script( 'bootstrapscript', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");
		echo __( $this->getCalcHtml(), 'MarkoWidget_domain' );
	}

	private function getCalcHtml()
	{
		$html=<<<HTML
	<section id="Kalkulator">
	 	        <div id="MarkoKalkulator"  class="container-fluid"> 
	 	        <div class="screen text-right" id="KalkulatorRezultat">&nbsp;</div>
	 	        <div class="col-xs-12 col-md-12 col-lg-12">	
					    <br>         
					    <div class="row">
					        <button class="col-md-3 btn btn-primary znak">7</button>
					        <button class="col-md-3 btn btn-primary znak">8</button>
					        <button class="col-md-3 btn btn-primary znak">9</button>
					        <button class="col-md-3 btn btn-info znak">/</button>
					    </div>
					    <div class="row">
					        <button class="col-md-3 btn btn-primary znak">4</button>
					        <button class="col-md-3 btn btn-primary znak">5</button>
					        <button class="col-md-3 btn btn-primary znak">6</button>
					        <button class="col-md-3 btn btn-info znak">*</button>
					    </div>
					    <div class="row">
						    <button class="col-md-3 btn btn-primary znak">1</button>
						    <button class="col-md-3 btn btn-primary znak">2</button>
						    <button class="col-md-3 btn btn-primary znak">3</button>
						    <button class="col-md-3 btn btn-info znak">-</button>
					    </div>
					    <div class="row">
						    <button class="col-md-3 btn btn-primary znak">0</button>
						    <button id="KalkulatorBrisi" class="col-md-3 btn btn-danger">C</button>
						    <button id="KalkulatorJednako"class="col-md-3 btn btn-success">=</button>
						    <button class="col-md-3 btn btn-info znak">+</button>
					    </div>
				</div>
				</div>
	</section>
HTML;

	return $html;
	}

}