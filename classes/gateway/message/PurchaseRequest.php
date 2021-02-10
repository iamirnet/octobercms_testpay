<?php

/**
 * @package iAmirNet\TestPay
 * @author Amir Hossein Jahani <me@iAmir.Net>
 */

namespace iAmirNet\TestPay\Classes\Gateway\Message;

use Symfony\Component\HttpFoundation\Request as HttpRequest;
use iAmirNet\Omnipay\Classes\Common\Http\ClientInterface;
use Exception;
use iAmirNet\Omnipay\Classes\Common\Exception\InvalidResponseException;

class PurchaseRequest extends AbstractRequest
{

    protected $liveEndpoint = '/fa/payment/test';

    public function getData()
    {
        $this->validate('amount', 'returnUrl');

        return [
            'Amount' => (int) $this->getAmount(),
            'ReturnUrl' => $this->getReturnUrl(),
            'OrderId' => (string) $this->getOrder()->id
        ];
    }

    public function sendData($data)
    {
        try {
            $data = array_merge(['status' => true, 'token' => time()], $data);
            return $this->response = $this->createResponse($data);
        } catch (Exception $e) {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }

    protected function createUri(string $endpoint)
    {
        return $endpoint . '/PaymentRequest.json';
    }

    protected function createResponse(array $data)
    {
        return new PurchaseResponse($this, $data);
    }
}
