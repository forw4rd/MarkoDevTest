<?php 
/**
 * @package  MarkoDevTest
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;


class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}


	public function markoOptionsGroup( $input )
	{
		return $input;
	}

	public function markoAdminSection()
	{

		echo   "<p>Shortcodovi koje sam konfigurirao u MarkoDevTest/inc/config/shortcode.config.php"
		       ."<br>[markotestvideo]<br>[markotestaudio]"
		       ."</p>";
	}


}