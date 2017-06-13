<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/16
 * Time: 15:16
 */
namespace ApigilityLogic\Finance\Service;

use Zend\ServiceManager\ServiceManager;
use ApigilityLogic\Finance\Doctrine\Entity as DoctrineEntity;

class LedgerService
{
    const DEFAULT_ACCOUNT_NAME = 'default';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function __construct(ServiceManager $services)
    {
        $this->em = $services->get('Doctrine\ORM\EntityManager');
    }

    public function createLedger($data)
    {
        $ledger = new DoctrineEntity\Ledger();
        if (isset($data->account)) $ledger->setAccount($data->account);

        if (isset($data->amount)) $ledger->setAmount($data->amount);
        else throw new \Exception('没有输入发生额', 500);

        if (isset($data->amount_type)) $ledger->setAmountType($data->amount_type);
        else throw new \Exception('没有输入发生额类型', 500);

        $top_ledger = $this->getTopLedger($ledger->getAccount());

        switch ($data->amount_type) {
            case DoctrineEntity\Ledger::AMOUNT_TYPE_DEBIT:
                if (empty($top_ledger)) $ledger->setBalance((double)$data->amount);
                else $ledger->setBalance((double)$data->amount+(double)$top_ledger->getBalance());
                break;

            case DoctrineEntity\Ledger::AMOUNT_TYPE_CREDIT:
                if (empty($top_ledger)) $ledger->setBalance(-(double)$data->amount);
                else $ledger->setBalance((double)$top_ledger->getBalance()-(double)$data->amount);
                break;

            default:
                throw new \Exception('未知的发生额类型', 500);

        }

        $ledger->setCreateTime(new \DateTime());

        $this->em->persist($ledger);
        $this->em->flush();

        return $ledger;
    }

    /**
     * @param $ledger_id
     * @return \ApigilityLogic\Finance\Doctrine\Entity\Ledger
     * @throws \Exception
     */
    public function getLedger($ledger_id)
    {
        $ledger = $this->em->find('ApigilityLogic\Finance\Doctrine\Entity\Ledger', $ledger_id);
        if (empty($ledger)) throw new \Exception('分录不存在', 404);
        else return $ledger;
    }

    /**
     * @param string $account
     * @return \ApigilityLogic\Finance\Doctrine\Entity\Ledger|null
     */
    public function getTopLedger($account = null)
    {
        return $this->em->getRepository('ApigilityLogic\Finance\Doctrine\Entity\Ledger')->findOneBy([
            'account' => $account
        ], [
            'id' => 'DESC'
        ]);
    }
}