<?php

namespace KassaCom\SDK\Model\Request\Wallet;

use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Request\Item\WalletLimitRequestItem;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class WalletChangeRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /** @var string */
    private $id;

    /** @var WalletLimitRequestItem|null */
    private $limits;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * @param WalletLimitRequestItem|null $limits
     */
    public function setLimits($limits)
    {
        $this->limits = $limits;
    }

    public function getRequiredFields()
    {
        return [
            'id' => self::TYPE_STRING,
        ];
    }

    public function getOptionalFields()
    {
        return [
            'limits' => WalletLimitRequestItem::class,
        ];
    }
}
