<?php

/**
 * @package iAmirNet\TestPay
 * @author Amir Hossein Jahani <me@iAmir.Net>
 */

namespace iAmirNet\TestPay\Classes\Gateway\Message;

class PurchaseCompleteResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        return true;
    }

    public function getTransactionReference()
    {
        return $this->data['token'];
    }
}
