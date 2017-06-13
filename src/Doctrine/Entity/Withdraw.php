<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 16:12:02
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;

use ApigilityLogic\Foundation\Doctrine\Field;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * Class Withdraw
 * @package ApigilityLogic\Finance\Doctrine\Entity
 * @Entity @Table(name="al_finance_withdraw")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 */
class Withdraw
{
    const STATUS_SUBMITTED = 1;  // 待审核
    const STATUS_APPROVED = 2;   // 已审核
    const STATUS_DONE = 3;       // 已处理

    use Field\Id;
    use Field\Amount;
    use Field\CreateTime;
    use Field\UpdateTime;
    use Field\Status;

    /**
     * 提现的账户
     *
     * @ManyToOne(targetEntity="Account", inversedBy="withdraws")
     * @JoinColumn(name="account_id", referencedColumnName="id")
     */
    protected $account;

    /**
     * 提现单完成提现后，所对应的账户记录
     *
     * @OneToOne(targetEntity="Ledger", inversedBy="withdraw")
     * @JoinColumn(name="ledger_id", referencedColumnName="id")
     */
    protected $ledger;

    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    public function setLedger($ledger)
    {
        $this->ledger = $ledger;
        return $this;
    }

    /**
     * @return Ledger
     */
    public function getLedger()
    {
        return $this->ledger;
    }
}