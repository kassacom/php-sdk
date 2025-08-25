<?php

namespace KassaCom\SDK\Model\Response\Item;

use KassaCom\SDK\Model\Interfaces\RestorableInterface;
use KassaCom\SDK\Model\Response\AbstractResponse;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class WalletLimitResponseItem extends AbstractResponse
{
    use RecursiveRestoreTrait;

    /**
     * @var float|null
     */
    protected $outPerDay;

    /**
     * @var float|null
     */
    protected $outPerDayCurrent;

    /**
     * @var float|null
     */
    protected $outPerMonth;

    /**
     * @var float|null
     */
    protected $outPerMonthCurrent;

    /**
     * @var float|null
     */
    protected $outMaxAmount;

    public function getOutPerDay()
    {
        return $this->outPerDay;
    }

    /**
     * @param float|null $outPerDay
     */
    public function setOutPerDay($outPerDay)
    {
        $this->outPerDay = $outPerDay;
    }

    public function getOutPerDayCurrent()
    {
        return $this->outPerDayCurrent;
    }

    /**
     * @param float|null $outPerDayCurrent
     */
    public function setOutPerDayCurrent($outPerDayCurrent)
    {
        $this->outPerDayCurrent = $outPerDayCurrent;
    }

    public function getOutPerMonth()
    {
        return $this->outPerMonth;
    }

    /**
     * @param float|null $outPerMonth
     */
    public function setOutPerMonth($outPerMonth)
    {
        $this->outPerMonth = $outPerMonth;
    }

    public function getOutPerMonthCurrent()
    {
        return $this->outPerMonthCurrent;
    }

    /**
     * @param float|null $outPerMonthCurrent
     */
    public function setOutPerMonthCurrent($outPerMonthCurrent)
    {
        $this->outPerMonthCurrent = $outPerMonthCurrent;
    }

    public function getOutMaxAmount()
    {
        return $this->outMaxAmount;
    }

    /**
     * @param float|null $outMaxAmount
     */
    public function setOutMaxAmount($outMaxAmount)
    {
        $this->outMaxAmount = $outMaxAmount;
    }

    public function getRequiredFields()
    {
        return [];
    }

    public function getOptionalFields()
    {
        return [
            'out_per_day' => RestorableInterface::TYPE_FLOAT,
            'out_per_day_current' => RestorableInterface::TYPE_FLOAT,
            'out_per_month' => RestorableInterface::TYPE_FLOAT,
            'out_per_month_current' => RestorableInterface::TYPE_FLOAT,
            'out_max_amount' => RestorableInterface::TYPE_FLOAT,
        ];
    }
}
