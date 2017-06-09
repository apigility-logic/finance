<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/16
 * Time: 14:28
 */
namespace ApigilityLogic\Finance\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use ApigilityLogic\Foundation\Doctrine\Field;

/**
 * Class Ledger
 * @package ApigilityLogic\Finance\Doctrine\Entity
 * @Entity @Table(name="al_finance_ledger")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 */
class Ledger
{
    const AMOUNT_TYPE_DEBIT = 1;
    const AMOUNT_TYPE_CREDIT = 2;

    use Field\Id;
    use Field\Amount; // 发生额
    use Field\Balance; // 账户余额
    use Field\CreateTime;

    /**
     * 账户名
     *
     * @Column(type="string", length=50, nullable=true)
     */
    protected $account;

    /**
     * 发生额的类型
     *
     * @Column(type="smallint", nullable=false)
     */
    protected $amount_type;

    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function setAmountType($amount_type)
    {
        $this->amount_type = $amount_type;
        return $this;
    }

    public function getAmountType()
    {
        return $this->amount_type;
    }
}