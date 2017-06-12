<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 16:12:02
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;


use ApigilityLogic\Foundation\Doctrine\Field;

class Withdraw
{
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
}