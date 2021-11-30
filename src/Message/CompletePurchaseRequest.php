<?php

namespace Paytic\Payments\Payu\Message;

use Paytic\Omnipay\Payu\Message\CompletePurchaseRequest as AbstractCompletePurchaseRequest;
use Paytic\Payments\Payu\Gateway;
use ByTIC\Payments\Models\Purchase\Traits\IsPurchasableModelTrait;

/**
 * Class PurchaseResponse
 * @package Paytic\Omnipay\Payu\Message
 */
class CompletePurchaseRequest extends AbstractCompletePurchaseRequest
{
    use Traits\CompletePurchaseRequestTrait;

    /**
     * @inheritdoc
     */
    public function isValidNotification()
    {
        if ($this->hasGet('ctrl')) {
            if ($this->validateModel()) {
                return parent::isValidNotification();
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function getModelIdFromRequest()
    {
        if ($this->httpRequest->query->has('hash')) {
            return $this->httpRequest->query->get('hash');
        }

        return $this->httpRequest->query->get('id');
    }

    /**
     * @inheritDoc
     */
    protected function parseNotification()
    {
        $model = $this->getModel();
        $this->updateParametersFromPurchase($model);

        return parent::parseNotification();
    }


    /**
     * @inheritdoc
     */
    protected function generateCtrl()
    {
        return $this->getModelCtrl();
    }

    /**
     * @return string
     */
    public function getModelCtrl()
    {
        /** @var IsPurchasableModelTrait $model */
        $model = $this->getModel();
        /** @var Gateway $gateway */
        $gateway = $model->getPaymentMethod()->getType()->getGateway();
        $purchaseRequest = $gateway->purchaseFromModel($model);

        return $purchaseRequest->getCtrl();
    }
}
