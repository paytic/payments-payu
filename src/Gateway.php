<?php

namespace Paytic\Payments\Payu;

use Paytic\Omnipay\Payu\Gateway as AbstractGateway;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Traits\GatewayTrait;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Traits\OverwriteServerCompletePurchaseTrait;

/**
 * Class Gateway
 * @package Paytic\Payments\Payu
 */
class Gateway extends AbstractGateway
{
    use GatewayTrait;
    use OverwriteServerCompletePurchaseTrait;

    /**
     * @return bool
     */
    public function isActive()
    {
        if (strlen($this->getMerchant()) > 5 && strlen($this->getSecretKey()) > 10) {
            return true;
        }

        return false;
    }
}
