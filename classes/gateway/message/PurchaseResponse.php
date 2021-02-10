<?php

/**
 * @package iAmirNet\TestPay
 * @author Amir Hossein Jahani <me@iAmir.Net>
 */

namespace iAmirNet\TestPay\Classes\Gateway\Message;

use iAmirNet\Omnipay\Classes\Common\Message\RedirectResponseInterface;
use function GuzzleHttp\Psr7\build_query;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $liveEndpoint = '/fa/payment/test';

    public function isSuccessful()
    {
        return true;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->getEndpoint() ."?". build_query($this->data);
    }

    protected function getEndpoint()
    {
        return $this->liveEndpoint;
    }
}
