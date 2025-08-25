<?php

namespace KassaCom\SDK\Model\Request\Wallet;

use KassaCom\SDK\Model\Request\AbstractRequestTransport;

class WalletChangeTransport extends AbstractRequestTransport
{
    public function getPath()
    {
        return 'wallet/change';
    }
}
