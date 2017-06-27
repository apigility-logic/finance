<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/12
 * Time: 17:37:03
 */

namespace ApigilityLogic\Finance\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Class CardWithdraw
 * @package ApigilityLogic\Finance\Doctrine\Entity
 * @Entity
 */
class CardWithdraw extends Withdraw
{
    /**
     * 账户所属客户
     *
     * @ManyToOne(targetEntity="Card", inversedBy="cardWithdraws")
     * @JoinColumn(name="card_id", referencedColumnName="id")
     */
    protected $card;

    public function setCard($card)
    {
        $this->card = $card;
        return $this;
    }

    /**
     * @return Card
     */
    public function getCard()
    {
        return $this->card;
    }
}