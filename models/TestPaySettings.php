<?php


namespace iAmirNet\TestPay\Models;

use Model;

class TestPaySettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'iamirnet_gateways_settings';
    public $settingsFields = '$/iamirnet/testpay/models/settings/fields_testpay.yaml';
}