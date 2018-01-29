<?php
/**
 * Created by PhpStorm.
 * User: mj
 * Date: 28.1.2018.
 * Time: 17:33
 */
namespace Inc\Config;

return [
	[
		'name' => 'markotestvideo',
		'icon' => "http://via.placeholder.com/64x64",
        'content' => 1,
		'action' => function (
			$atts=['class'=>'img-responsive', 'controls'],
			$content='<source type="video/webm" src="https://www.videvo.net/videvo_files/converted/2016_08/preview/VID_20160517_175443.mp441505.webm">'
			         .'<source type="video/mp4" src="https://www.videvo.net/videvo_files/converted/2016_08/videos/VID_20160517_175443.mp441505.mp4">',
			$tag='video'
		)
		{   // closure
			$atributes="";

			foreach ($atts as $key=>$atributval):
				if(is_numeric($key)):
					$atributes.=" ".$atributval;
				else:
					$atributes.=" ".$key."=\"".$atributval."\"";
				endif;
			endforeach;
			return "<".$tag." ".$atributes.">". $content."</".$tag.">";
		}
	],

	[
		'name' => 'markotestaudio',
		'icon' => "http://via.placeholder.com/64x64",
		'content' => 1,
		'action' => function ($atts=['controls'], $content='<source src="audio.mp3" type="video/mp4">', $tag='audio') {   // closure
			$atributes="";
			foreach ($atts as $key=>$atributval):
				if(is_numeric($key)):
					$atributes.=" ".$atributval;
				else:
					$atributes.=" ".$key."=\"".$atributval."\"";
				endif;
			endforeach;

			return "<".$tag." ".$atributes.">". $content."</".$tag.">";
		}
	]


 ];


