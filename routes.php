<?php

use Azarinweb\Minimall\Models\PaymentLog;
use Cms\Classes\Controller;
use Azarinweb\Minimall\Classes\Feeds\GoogleMerchantFeed;
use Azarinweb\Minimall\Models\FeedSettings;
use \Azarinweb\Minimall\Classes\Payments\PaymentProvider;


Route::any('/fa/payment/test', function () {
    $data = request()->all();
    unset($data['ReturnUrl']);
    header("Location: " . request('ReturnUrl') . "&" . \GuzzleHttp\Psr7\build_query($data));
    die();
});
