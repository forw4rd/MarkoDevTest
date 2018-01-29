<?php
/**
 * Created by PhpStorm.
 * User: mj
 * Date: 28.1.2018.
 * Time: 1:54
 */

namespace Inc\Base;


class Shortcode extends BaseController
{

	protected $shortCodes=[];


	public function register()
	{
		$this->shortCodes= array_merge($this->shortCodes, require $this->plugin_path."/inc/config/shortcode.config.php");
		foreach ($this->shortCodes as $shortCode):
			if(!shortcode_exists($shortCode['name']."")):
				//add_shortcode( $shortCode["name"]."", [$this, Shortcode::regajShortcode($shortCode)]);
				//add_shortcode( $shortCode["name"]."", $this->regajShortcode($shortCode));
				//var_dump($shortCode);
				add_shortcode( $shortCode["name"]."", function() use ($shortCode) {return Shortcode::callbackShortcode($shortCode); } );
			endif;

		endforeach;
	}



	public function callbackShortcode($shortCode)
	{

		return $shortCode['action']();
		/*
		$shortCode = [
			'name' => "markovideo",
			'icon' => "http://via.placeholder.com/64x64",
			'content' => 1,
			'action' => function ($atts=['class'=>'img-responsive', 'controls'], $content='<source src="movie.mp4" type="video/mp4">', $tag='video') {   // closure
				$atributes="";
				var_dump($atts);
				foreach ($atts as $key=>$atributval):
					if(is_numeric($key)):
						$atributes.=" ".$atributval;
					else:
						$atributes.=" ".$key."=\"".$atributval."\"";
					endif;
				endforeach;
				var_dump($atributes);
				return "<".$tag." ".$atributes.">". $content."</".$tag.">";
			},
		];

		return call_user_func($shortCode['action']);
		*/
	}

}