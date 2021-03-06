<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 16:15:48
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;


use ApigilityLogic\Foundation\Doctrine\Field;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class Account
 * @package ApigilityLogic\Finance\Doctrine\Entity
 * @Entity @Table(name="al_finance_account")
 */
class Account
{
    use Field\Id;
    use Field\Name;
    use Field\CreateTime;
    use Field\UpdateTime;

    /**
     * 账户所属客户
     *
     * @ManyToOne(targetEntity="Customer", inversedBy="accounts")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * 账户包含的记账记录
     *
     * @OneToMany(targetEntity="Ledger", mappedBy="account")
     */
    protected $ledgers;

    /**
     * 账户的所有提现单
     *
     * @OneToMany(targetEntity="Withdraw", mappedBy="card")
     */
    protected $withdraws;

    function __construct()
    {
        $this->ledgers = new ArrayCollection();
        $this->withdraws = new ArrayCollection();
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}