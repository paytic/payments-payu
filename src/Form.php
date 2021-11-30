<?php

namespace Paytic\Payments\Payu;

use ByTIC\Payments\Gateways\Providers\AbstractGateway\Form as AbstractForm;

/**
 * Class Form
 * @package Paytic\Payments\Payu
 */
class Form extends AbstractForm
{
    public function initElements()
    {
        $this->addInput('merchant', 'Merchant');
        $this->addInput('secretKey', 'Secret Key');
    }
}
