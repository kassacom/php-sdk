<?php

namespace KassaCom\SDK\Model\Request;

use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Response\Item\ErrorDetailsItem;
use KassaCom\SDK\Model\Response\Item\MoneyItem;
use KassaCom\SDK\Model\Response\Item\OrderResponseItem;
use KassaCom\SDK\Model\Response\Item\PaymentMethodItem;
use KassaCom\SDK\Model\Response\Item\ReceiptItem;
use KassaCom\SDK\Model\Response\Item\RefundResponseItem;
use KassaCom\SDK\Model\Response\Item\SplitResponseItem;
use KassaCom\SDK\Model\Response\Item\SubscriptionItem;
use KassaCom\SDK\Model\Response\Item\WalletResponseItem;
use KassaCom\SDK\Model\Response\Payment\GetPaymentResponseTrait;
use KassaCom\SDK\Model\Response\Refund\GetRefundResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\NotificationType;

class NotificationRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;
    use GetPaymentResponseTrait;

    /**
     * @var RefundResponseItem|null
     */
    private $refund;

    /**
     * @var object
     */
    private $notificationType;

    /**
     * @return RefundResponseItem|null
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param RefundResponseItem|null $refund
     * @return NotificationRequest
     */
    public function setRefund($refund)
    {
        $this->refund = $refund;

        return $this;
    }

    /**
     * @return object
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * @param object $notificationType
     */
    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;
    }

    public function getRequiredFields()
    {
        return [
            'id' => RestorableInterface::TYPE_INTEGER,
            'order' => OrderResponseItem::class,
            'wallet' => WalletResponseItem::class,
            'token' => RestorableInterface::TYPE_STRING,
            'create_date' => RestorableInterface::TYPE_DATE,
            'status' => RestorableInterface::TYPE_STRING,
            'notification_type' => new NotificationType($this),
        ];
    }

    public function getOptionalFields()
    {
        return [
            'partner_payment_id' => RestorableInterface::TYPE_STRING,
            'expire_date' => RestorableInterface::TYPE_DATE,
            'ip' => RestorableInterface::TYPE_STRING,
            'status_description' => RestorableInterface::TYPE_STRING,
            'payment_method' => PaymentMethodItem::class,
            'custom_parameters' => RestorableInterface::TYPE_ARRAY,
            'update_date' => RestorableInterface::TYPE_DATE,
            'receipt' => ReceiptItem::class,
            'is_test' => RestorableInterface::TYPE_BOOLEAN,
            'available_full_refund' => self::TYPE_BOOLEAN,
            'available_partial_refund' => self::TYPE_BOOLEAN,
            'available_for_refund' => MoneyItem::class,
            'refunds' => [GetRefundResponse::class],
            'split' => [SplitResponseItem::class],
            'payer' => MoneyItem::class,
            'extra' => MoneyItem::class,
            'error_details' => ErrorDetailsItem::class,
            'subscription' => SubscriptionItem::class,
            'refund' => RefundResponseItem::class,
        ];
    }
}
