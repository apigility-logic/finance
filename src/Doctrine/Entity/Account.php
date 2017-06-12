<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 16:15:48
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;


use ApigilityLogic\Foundation\Doctrine\Field;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

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
}