<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 17:34:24
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;

use ApigilityLogic\Foundation\Doctrine\Field;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class Card
 * @package ApigilityLogic\Finance\Doctrine\Entity
 * @Entity @Table(name="al_finance_card")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 */
class Card
{
    use Field\Id;
    use Field\Name;
    use Field\CreateTime;
    use Field\UpdateTime;
    use Field\Tel;
    use Field\Number;
    use Field\IdentityCardNumber;

    /**
     * @Column(type="string", length=50, nullable=true)
     */
    protected $bank_name;

    /**
     * 所属客户
     *
     * @ManyToOne(targetEntity="Customer", inversedBy="cards")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * 通过此卡提现的所有提现单
     *
     * @OneToMany(targetEntity="CardWithdraw", mappedBy="card")
     */
    protected $cardWithdraws;

    function __construct()
    {
        $this->cardWithdraws = new ArrayCollection();
    }

    public function setBankName($bank_name)
    {
        $this->bank_name = $bank_name;
        return $this;
    }

    public function getBankName()
    {
        return $this->bank_name;
    }
}