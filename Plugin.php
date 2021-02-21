<?php namespace iAmirNet\TestPay;

use App;
use Auth;
use iAmirNet\TestPay\Models\TestPaySettings;
use Event;
use System\Classes\PluginBase;
class Plugin extends PluginBase
{
    /**
     * @var boolean Determine if this plugin should have elevated privileges.
     */
    public $elevated = true;

    public function pluginDetails()
    {
        return [
            'name'        => 'iamirnet.testpay::lang.plugin.name',
            'description' => 'iamirnet.testpay::lang.plugin.description',
            'author'      => 'iamirnet',
            'icon'        => 'icon-user',
            'homepage'    => 'https://iAmir.Net'
        ];
    }

    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

    public function register()
    {
        //parent::register(); // TODO: Change the autogenerated stub
    }

    public function registerPermissions()
    {
        return [
            'iamirnet.testpay.access_testpay' => [
                'tab'   => 'iamirnet.testpay::lang.plugin.tab',
                'label' => 'iamirnet.testpay::lang.plugin.access_testpay'
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'iamirnet.testpay::lang.testpay.title',
                'description' => 'iamirnet.testpay::lang.testpay.description',
                'category'    => 'iamirnet.minimall::lang.settings.gateway.title',
                'icon'        => 'icon-cog',
                'class'       => TestPaySettings::class,
                'order'       => 700,
                'permissions' => ['iamirnet.testpay.access_testpay']
            ]
        ];
    }
}
