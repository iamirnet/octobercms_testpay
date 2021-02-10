<?php

/**
 * @package iAmirNet\TestPay
 * @author Amir Hossein Jahani <me@iAmir.Net>
 */

namespace iAmirNet\TestPay\Classes\Gateway\Message;

use iAmirNet\Omnipay\Classes\Common\Exception\InvalidResponseException;

class PurchaseCompleteRequest extends AbstractRequest
{

    protected $liveEndpoint = '/fa/payment/test';

    public function getData()
    {
        $this->validate('tokenPay');

        return [
            'token' => $this->getTokenPay(),
        ];
    }

    public function sendData($data)
    {
        try {
            $data = array_merge(['status' => true], $data);
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
        return $endpoint . '/PaymentVerification.json';
    }

    protected function createResponse(array $data)
    {
        return new PurchaseCompleteResponse($this, $data);
    }
}
