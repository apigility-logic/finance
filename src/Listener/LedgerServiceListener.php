<?php
/**
 * Created by PhpStorm.
 * User: kentkent
 * Date: 2017/7/4
 * Time: 下午3:44
 */

namespace ApigilityLogic\Finance\Listener;

use ApigilityLogic\Finance\Doctrine\Entity\Ledger;
use ApigilityLogic\Finance\Event\WithdrawEvent;
use ApigilityLogic\Finance\Service\LedgerService;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class LedgerServiceListener implements ListenerAggregateInterface
{
    /**
     * @var array
     */
    protected $listeners = [];

    /**
     * @inheritdoc
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            WithdrawEvent::EVENT_WITHDRAW_SWITCHED_TO_DONE,
            [$this, 'generateLedger']
        );
    }

    /**
     * @inheritdoc
     */
    public function detach(EventManagerInterface $events)
    {
        // TODO: Implement detach() method.
    }

    public function generateLedger(WithdrawEvent $event)
    {
        if (!$event->getEntity()->getLedger()) {
            /** @var LedgerService $ledger_service */
            $ledger_service = $event->getServiceManager()->get(LedgerService::class);

            // 创建扣减记账记录
            $ledger_service->createLedger((object)[
                'account' => $event->getEntity()->getAccount(),
                'amount' => $event->getEntity()->getAmount(),
                'amount_type' => Ledger::AMOUNT_TYPE_CREDIT
            ]);
        }
    }

}