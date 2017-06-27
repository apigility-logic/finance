<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 10:29:07
 */

namespace ApigilityLogic\Finance\Listener;

use ApigilityLogic\Finance\Event\WithdrawEvent;
use ApigilityLogic\Finance\Service\WithdrawService;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class WithdrawServiceListener implements ListenerAggregateInterface
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
            WithdrawEvent::EVENT_WITHDRAW_SWITCHED_TO_HANDLING,
            [$this, 'payWithdraw']
        );
    }

    /**
     * @inheritdoc
     */
    public function detach(EventManagerInterface $events)
    {
        // TODO: Implement detach() method.
    }

    public function payWithdraw(WithdrawEvent $event)
    {
        $config = $event->getServiceManager()->get('config');
        $adapter_config = $config['apigility-logic']['finance']['withdraw']['adapter'];

        if ($adapter_config['enable']) {
            $withdraw_service = $event->getServiceManager()->get(WithdrawService::class);
            $withdraw_service->handleWithdraw($event->getEntity());
        }
    }
}