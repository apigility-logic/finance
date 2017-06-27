<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 10:37:29
 */

namespace ApigilityLogic\Finance\Service\Adapter;

use ApigilityLogic\Finance\Doctrine\Entity\Withdraw;

interface WithdrawHandleAdapterInterface
{
    /**
     * @param Withdraw $withdraw
     * @return string 金融机构交易单号
     */
    public function handle($withdraw);
}