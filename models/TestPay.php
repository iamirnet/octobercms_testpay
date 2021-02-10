<?php

namespace iAmirNet\TestPay\Models;

use Azarinweb\Minimall\Classes\Payments\PaymentProvider;
use Azarinweb\Minimall\Classes\Payments\PaymentResult;
use Azarinweb\Minimall\Models\Order;
use iAmirNet\TestPay\Classes\Gateway\Gateway;

use Request;
use Session;
use Throwable;
use Validator;

class TestPay extends PaymentProvider
{
    public function name(): string
    {
        return 'درگاه آزمایشی';
    }

    public function identifier(): string
    {
        return 'testpay';
    }

    public function validate(): bool
    {
        return true;
    }

    protected function getGateway()
    {
        $gateway = new Gateway();
        $gateway->setOrder($this->order ? : Order::find(request('OrderId')));
        return $gateway;
    }

    public function settings(): array
    {
        return [];
    }

    public function process(PaymentResult $result): PaymentResult
    {
        $gateway = $this->getGateway();
        $response = null;
        try {
            $response = $gateway->purchase([
                'amount' => $this->order->total_in_currency,
                'description' => TestPaySettings::get('testpay_description'),
                'returnUrl' => $this->returnUrl(),
            ])->send();
        } catch (Throwable $e) {
            return $result->fail([], $e);
        }

        if (!$response->isRedirect()) {
            return $result->fail((array)$response->getData(), $response);
        }
        Session::put('minimall.payment.callback', self::class);
        Session::put('minimall.testpay.transactionReference', $response->getTransactionReference());
        return $result->redirect($response->getRedirectResponse()->getTargetUrl());
    }

    public function complete(PaymentResult $result): PaymentResult
    {
        $gateway = $this->getGateway();
        $response = null;
        try {
            $response = $gateway->completePurchase(request()->all())->send();
        } catch (Throwable $e) {
            return $result->fail([], $e);
        }
        if ($response->isSuccessful()) {
            return $result->success($response->getData(), 'پرداخت با موفقیت انجام گردید.');
        } else {
            return $result->fail($response->getData(), 'پرداخت انجام نشد.');
        }
    }
}
