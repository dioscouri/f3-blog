<?php 
namespace Blog\Admin\Controllers;

class Settings extends \Admin\Controllers\BaseAuth 
{
	use \Dsc\Traits\Controllers\Settings;
	
	protected $layout_link = 'Blog/Admin/Views::settings/default.php';
	protected $settings_route = '/admin/blog/settings';
    
    protected function getModel()
    {
        $model = new \Blog\Models\Settings;
        return $model;
    }
}