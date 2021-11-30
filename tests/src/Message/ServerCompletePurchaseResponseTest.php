<?php

namespace Paytic\Payments\Payu\Tests\Message;

use Paytic\Payments\Payu\Message\ServerCompletePurchaseRequest;
use Paytic\Payments\Payu\Message\ServerCompletePurchaseResponse;
use Paytic\Payments\Tests\AbstractTest;
use Paytic\Payments\Tests\Gateways\Message\ServerCompletePurchaseResponseTrait;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ServerCompletePurchaseResponseTest
 * @package Paytic\Payments\Payu\Tests\Message
 */
class ServerCompletePurchaseResponseTest extends AbstractTest
{
    use ServerCompletePurchaseResponseTrait;

    /**
     * @return ServerCompletePurchaseResponse
     */
    protected function getNewResponse()
    {
        $request = new ServerCompletePurchaseRequest($this->client, new Request());

        return new ServerCompletePurchaseResponse($request, []);
    }
}
