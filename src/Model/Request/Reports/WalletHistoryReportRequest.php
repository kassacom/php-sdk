<?php

namespace KassaCom\SDK\Model\Request\Reports;


use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class WalletHistoryReportRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * Начала периода, в формате datetime
     *
     * @var \DateTime
     */
    private $datetimeFrom;

    /**
     * Завершение периода, в формате datetime
     *
     * @var \DateTime
     */
    private $datetimeTo;

    /**
     * Идентификатор кошелька
     *
     * @var integer
     */
    private $walletId;

    /**
     * Фильтр по типам записей в истории.
     *
     * @var array|null
     */
    private $operationType;

    /**
     * @return \DateTime
     */
    public function getDatetimeFrom()
    {
        return $this->datetimeFrom;
    }

    /**
     * @param \DateTime $datetimeFrom
     */
    public function setDatetimeFrom($datetimeFrom)
    {
        $this->datetimeFrom = $datetimeFrom;
    }

    /**
     * @return \DateTime
     */
    public function getDatetimeTo()
    {
        return $this->datetimeTo;
    }

    /**
     * @param \DateTime $datetimeTo
     */
    public function setDatetimeTo($datetimeTo)
    {
        $this->datetimeTo = $datetimeTo;
    }

    /**
     * @return int
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param int $walletId
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;
    }

    /**
     * @return array|null
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @param array|null $operationType
     */
    public function setOperationType($operationType)
    {
        $this->operationType = $operationType;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'datetime_from' => self::TYPE_DATE,
            'datetime_to' => self::TYPE_DATE,
            'wallet_id' => self::TYPE_INTEGER,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'operation_type' => [self::TYPE_STRING],
        ];
    }
}
