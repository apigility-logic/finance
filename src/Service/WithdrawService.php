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

    /**
     * 处理提现单，自动打款
     * @param Withdraw $withdraw
     */
    public function handleWithdraw(Withdraw $withdraw)
    {
        $withdraw->setTransactionNumber($this->adapter->handle($withdraw));
        $this->em->flush();
    }

    /**
     * 主动更新提现单的处理状态（是否已完成打款）
     * @param Withdraw $withdraw
     */
    public function updateWithdrawHandleStatus(Withdraw $withdraw)
    {
        if ($this->adapter->checkStatus($withdraw)) {
            $withdraw->setStatus(Withdraw::STATUS_DONE);
            $this->em->flush();
        }
    }
}