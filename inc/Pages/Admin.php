<?php 
/**
 * @package  MarkoDevTest
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'MarkoDevTest',
				'menu_title' => 'MarkoDevTest',
				'capability' => 'manage_options', 
				'menu_slug' => 'markodevtest',
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(

		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'marko_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'markoOptionsGroup' )
			),

		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'marko_admin_index',
				'title' => 'MarkoAdminSection',
				'callback' => array( $this->callbacks, 'markoAdminSection' ),
				'page' => 'markodevtest'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(

		);

		$this->settings->setFields( $args );
	}
}