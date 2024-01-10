<?php

namespace Paytic\Payments\Payu\Message;

use Paytic\Omnipay\Payu\Message\ServerCompletePurchaseRequest as AbstractServerCompletePurchaseRequest;
use ByTIC\Payments\Gateways\Providers\AbstractGateway\Message\Traits\HasModelRequest;
use Paytic\Payments\Payu\Gateway;
use ByTIC\Payments\Models\Purchase\Traits\IsPurchasableModelTrait;

/**
 * Class ServerCompletePurchaseRequest
 * @package Paytic\Omnipay\Payu\Message
 */
class ServerCompletePurchaseRequest extends AbstractServerCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;

    /**
     * @inheritdoc
     */
    public function isValidNotification()
    {
        if (false == $this->hasPOST('REFNOEXT')) {
            return false;
        }
        if (false == $this->validateModel()) {
            return false;
        }
        $model = $this->getModel();
        $this->updateParametersFromPurchase($model);

        return parent::isValidNotification();
    }

    /**
     * Returns ID if it has it
     * @return int
     */
    public function getModelIdFromRequest()
    {
        return $this->httpRequest->request->get('REFNOEXT');
    }
}
