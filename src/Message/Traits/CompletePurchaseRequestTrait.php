<?php

namespace Paytic\Payments\Payu\Message\Traits;

use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasGatewayRequestTrait;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasModelRequest;

/**
 * Trait CompletePurchaseRequestTrait
 * @package Paytic\Payments\Payu\Message\Traits
 */
trait CompletePurchaseRequestTrait
{
    use HasGatewayRequestTrait;
    use HasModelRequest;

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $return = parent::getData();
        // Add model only if has data
        if (count($return)) {
            $return['model'] = $this->getModel();
        }

        return $return;
    }

    /**
     * @param \Paytic\Payments\Payu\Gateway $model
     */
    protected function updateParametersFromGateway($gateway)
    {
//        $this->setMerchant($gateway->getMerchant());
        $this->setSecretKey($gateway->getSecretKey());
    }
}
