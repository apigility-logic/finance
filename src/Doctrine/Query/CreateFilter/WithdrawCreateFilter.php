<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/6
 * Time: 18:20:05
 */
namespace ApigilityLogic\Finance\Doctrine\Query\CreateFilter;

use ApigilityLogic\Finance\Doctrine\Entity\CardWithdraw;
use ApigilityLogic\Finance\Event\WithdrawEvent;
use ApigilityLogic\Foundation\Doctrine\Query\CreateFilter\AbstractCreateFilter;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use ZF\Rest\ResourceEvent;

class WithdrawCreateFilter extends AbstractCreateFilter implements EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    /**
     * @param ResourceEvent $event
     * @param string $entityClass
     * @param array $data
     * @return array
     */
    public function filter(ResourceEvent $event, $entityClass, $data)
    {
        $this->setCreateTime($data);
        $this->setUpdateTime($data);

        if ($entityClass === CardWithdraw::class && $event->getName() === 'create' && !isset($data->status)) {
            $data->status = CardWithdraw::STATUS_SUBMITTED;
        }

        return $data;
    }

    public function triggerEventEntityEvent($entity)
    {
        // 触发事件
        $event = new WithdrawEvent(WithdrawEvent::EVENT_WITHDRAW_SWITCHED_TO_HANDLING);
        $event->setTarget($this);
        $event->setEntity($entity);
        $this->getEventManager()->triggerEvent($event);
    }
}