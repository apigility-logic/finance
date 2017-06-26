<?php
namespace ApigilityLogic\Finance\Event;

use ApigilityLogic\Finance\Doctrine\Entity\Withdraw;
use Zend\EventManager\Event;

/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/26
 * Time: 20:10:33
 */
class WithdrawEvent extends Event
{
    const EVENT_WITHDRAW_SWITCHED_TO_HANDLING = 'WithdrawEvent.EVENT_WITHDRAW_SWITCHED_TO_HANDLING';

    private $entity;

    public function __construct($type)
    {
        parent::__construct($type);
    }

    /**
     * @param Withdraw $entity
     */
    public function setEntity(Withdraw $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return Withdraw
     */
    public function getEntity()
    {
        return $this->entity;
    }
}