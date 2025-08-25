<?php

namespace KassaCom\SDK\Model\Request\Item;

use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;

class WalletLimitRequestItem extends AbstractRequestItem
{
    use RecursiveRestoreTrait;

    /** @var float|null */
    protected $outPerDay;
    /** @var float|null */
    protected $outPerMonth;
    /** @var float|null */
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
            'out_per_day' => self::TYPE_FLOAT,
            'out_per_month' => self::TYPE_FLOAT,
            'out_max_amount' => self::TYPE_FLOAT,
        ];
    }
}
