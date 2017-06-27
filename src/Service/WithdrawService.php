<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 10:30:41
 */

namespace ApigilityLogic\Finance\Service;


use ApigilityLogic\Finance\Doctrine\Entity\Withdraw;
use ApigilityLogic\Finance\Service\Adapter\WithdrawHandleAdapterInterface;
use Zend\ServiceManager\ServiceManager;

class WithdrawService
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var WithdrawHandleAdapterInterface
     */
    protected $adapter;

    public function __construct(ServiceManager $services)
    {
        $this->em = $services->get('Doctrine\ORM\EntityManager');
        $this->adapter = $services->get(WithdrawHandleAdapterInterface::class);
    }

    public function handleWithdraw(Withdraw $withdraw)
    {
        $withdraw->setTransactionNumber($this->adapter->handle($withdraw));
        $this->em->flush();
    }
}