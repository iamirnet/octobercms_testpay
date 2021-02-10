<?php

/**
 * @package iAmirNet\TestPay
 * @author Amir Hossein Jahani <me@iAmir.Net>
 */

namespace iAmirNet\TestPay\Classes\Gateway\Message;


abstract class AbstractRequest extends \iAmirNet\Omnipay\Classes\Common\Message\AbstractRequest
{
    use Call;

    public function getAmount()
    {
        $value = parent::getAmount();
        $value = $value ?: $this->httpRequest->query->get('Amount');
        return $value;
    }
}
