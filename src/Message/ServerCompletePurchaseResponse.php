<?php

namespace Paytic\Payments\Payu\Message;

use Paytic\Omnipay\Payu\Message\ServerCompletePurchaseResponse as AbstractServerCompletePurchaseResponse;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\CompletePurchaseResponseTrait;

/**
 * Class ServerCompletePurchaseResponse
 * @package Paytic\Omnipay\Payu\Message
 */
class ServerCompletePurchaseResponse extends AbstractServerCompletePurchaseResponse
{
    use CompletePurchaseResponseTrait;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return bool
     */
    protected function canProcessModel()
    {
        return true;
    }
}
