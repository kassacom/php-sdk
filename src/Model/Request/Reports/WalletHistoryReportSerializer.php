<?php

namespace KassaCom\SDK\Model\Request\Reports;

use KassaCom\SDK\Model\Request\AbstractRequestSerializer;

class WalletHistoryReportSerializer extends AbstractRequestSerializer
{
    /**
     * @inheritDoc
     */
    public function getSerializedData()
    {
        /** @var WalletHistoryReportRequest $request */
        $request = $this->request;

        $data = [
            'datetime_from' => $request->getDatetimeFrom()->format('c'),
            'datetime_to' => $request->getDatetimeTo()->format('c'),
            'wallet_id' => $request->getWalletId(),
        ];

        if ($request->getOperationTypes() !== null) {
            $data['operation_types'] = $request->getOperationTypes();
        }

        return $data;
    }
}
