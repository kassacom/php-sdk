<?php

namespace KassaCom\SDK\Model\Request\Wallet;

use KassaCom\SDK\Model\Request\AbstractRequestSerializer;
use KassaCom\SDK\Model\Request\Item\WalletLimitRequestItem;

class WalletChangeSerializer extends AbstractRequestSerializer
{
    public function getSerializedData()
    {
        /** @var WalletChangeRequest $request */
        $request = $this->request;
        /** @var WalletLimitRequestItem|null $limits */
        $limits = $request->getLimits();

        $data = [
            'id' => $request->getId(),
        ];

        if ($limits) {
            $data['limits'] = [];
        }

        if ($limits && $limits->getOutPerDay()) {
            $data['limits']['out_per_day'] = $limits->getOutPerDay();
        }

        if ($limits && $limits->getOutPerMonth()) {
            $data['limits']['out_per_month'] = $limits->getOutPerMonth();
        }

        if ($limits && $limits->getOutMaxAmount()) {
            $data['limits']['out_max_amount'] = $limits->getOutMaxAmount();
        }

        return $data;
    }
}
