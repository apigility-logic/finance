<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 17:34:00
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;


use ApigilityLogic\Foundation\Doctrine\Field;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * Class Customer
 * @package ApigilityLogic\Finance\Doctrine\Entity
 * @Entity @Table(name="al_finance_customer")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 */
class Customer
{
    use Field\Id;
    use Field\Name;
    use Field\CreateTime;
    use Field\UpdateTime;

    /**
     * 客户扔有的账户
     *
     * @OneToMany(targetEntity="Account", mappedBy="customer")
     */
    protected $accounts;

    /**
     * 客户扔有的银行卡
     *
     * @OneToMany(targetEntity="Card", mappedBy="customer")
     */
    protected $cards;

    function __construct()
    {
        $this->accounts = new ArrayCollection();
        $this->cards = new ArrayCollection();
    }

    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
        return $this;
    }

    /**
     * @return ArrayCollection|Account[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }
}