<?php
namespace ApigilityLogic\Finance\Event;

use ApigilityLogic\Finance\Doctrine\Entity\Withdraw;
use Zend\EventManager\Event;
use Zend\ServiceManager\ServiceManager;

/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/26
 * Time: 20:10:33
 */
class WithdrawEvent extends Event
{
    const EVENT_WITHDRAW_SWITCHED_TO_HANDLING = 'WithdrawEvent.EVENT_WITHDRAW_SWITCHED_TO_HANDLING';
    const EVENT_WITHDRAW_FETCHING_HANDLING_ENTITY = 'WithdrawEvent.EVENT_WITHDRAW_FETCHING_HANDLING_ENTITY';

    private $entity;

    private $serviceManager;

    public function __construct($type, ServiceManager $serviceManager)
    {
        parent::__construct($type);
        $this->serviceManager = $serviceManager;
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

    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}