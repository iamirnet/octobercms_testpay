<?php


namespace iAmirNet\TestPay\Classes\Gateway\Message;


trait Call
{
    public function getOrder()
    {
        return $this->getParameter('order');
    }

    public function getTokenPay()
    {
        return $this->getParameter('tokenPay') ?: request('token');
    }

    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }

    public function setTokenPay(string $value)
    {
        return $this->setParameter('tokenPay', $value);
    }

    public function setOrder($value)
    {
        return $this->setParameter('order', $value);
    }

    public function setReturnUrl($value)
    {
        return $this->setParameter('returnUrl', $value);
    }

    public function getGateState()
    {
        $value = $this->getParameter('gateState');
        $value = $value ?: $this->httpRequest->get('state');
        return $value;
    }
}
