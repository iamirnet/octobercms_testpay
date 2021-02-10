<?php

/**
 * @package iAmirNet\TestPay
 * @author Amir Hossein Jahani <me@iAmir.Net>
 */

namespace iAmirNet\TestPay\Classes\Gateway;

use iAmirNet\Omnipay\Classes\Common\AbstractGateway;
use iAmirNet\TestPay\Classes\Gateway\Message\PurchaseCompleteRequest;
use iAmirNet\TestPay\Classes\Gateway\Message\PurchaseRequest;

/**
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface authorize(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface capture(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface refund(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface void(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface createCard(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{
    use Message\Call;

    public function getName()
    {
        return 'TestPay';
    }

    public function getDefaultParameters()
    {
        return [
            'gateSate' => '',
            'testMode' => false,
            'tokenPay' => '',
            'order' => [],
            'returnUrl' => '',
        ];
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseCompleteRequest::class, $parameters);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \iAmirNet\Omnipay\Classes\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
