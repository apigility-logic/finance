<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/6
 * Time: 18:20:05
 */
namespace ApigilityLogic\Finance\Doctrine\Query\CreateFilter;

use ApigilityLogic\Finance\Doctrine\Entity\CardWithdraw;
use ApigilityLogic\Foundation\Doctrine\Query\CreateFilter\AbstractCreateFilter;
use ZF\Rest\ResourceEvent;

class WithdrawCreateFilter extends AbstractCreateFilter
{
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
}