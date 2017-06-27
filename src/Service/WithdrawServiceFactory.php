<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 10:30:58
 */

namespace ApigilityLogic\Finance\Service;

use Zend\ServiceManager\ServiceManager;

class WithdrawServiceFactory
{
    public function __invoke(ServiceManager $services)
    {
        return new WithdrawService($services);
    }
}