<?php

namespace KassaCom\SDK\Model\Response\Item;

use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\SubscriptionStatuses;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class SubscriptionItem extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     * @see SubscriptionStatuses
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createDate;

    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function getRequiredFields()
    {
        return [
            'token' => RestorableInterface::TYPE_STRING,
            'status' => RestorableInterface::TYPE_STRING,
            'create_date' => RestorableInterface::TYPE_DATE,
        ];
    }

    public function getOptionalFields()
    {
        return [];
    }
}
