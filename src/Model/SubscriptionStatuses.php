<?php

namespace KassaCom\SDK\Model;

final class SubscriptionStatuses
{
    /** @var string Подписка инициализирована, ожидается подтверждение инициирующего платежа. */
    const STATUS_INIT = 'init';

    /** @var string Подписка активна. */
    const STATUS_ACTIVE = 'active';

    /** @var string Подписка не активна, рекуррентные списания по ней проходить не будут. */
    const STATUS_DISABLED = 'disabled';

    /** @var string Отказ провайдера в создании подписки. */
    const STATUS_DECLINE = 'decline';
}
