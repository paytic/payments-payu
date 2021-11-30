<?php

namespace Paytic\Payments\Payu\Tests\Message;

use Paytic\Payments\Payu\Message\CompletePurchaseResponse;
use Paytic\Payments\Payu\Message\CompletePurchaseRequest;
use Paytic\Payments\Tests\AbstractTest;
use Paytic\Payments\Tests\Gateways\Message\CompletePurchaseResponseTestTrait;
use Symfony\Component\HttpFoundation\Request;

class CompletePurchaseResponseTest extends AbstractTest
{
    use CompletePurchaseResponseTestTrait;

    protected function getNewResponse()
    {
        $request = new CompletePurchaseRequest($this->client, new Request());

        return new CompletePurchaseResponse($request, []);
    }
}
