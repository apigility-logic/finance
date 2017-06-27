<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/16
 * Time: 14:52
 */
return [
    'service_manager' => array(
        'factories' => array(
            \ApigilityLogic\Finance\Service\LedgerService::class=>\ApigilityLogic\Finance\Service\LedgerServiceFactory::class,
            \ApigilityLogic\Finance\Service\WithdrawService::class=>\ApigilityLogic\Finance\Service\WithdrawServiceFactory::class,
            \ApigilityLogic\Finance\Service\Adapter\WithdrawHandleAdapterInterface::class=>\ApigilityLogic\Finance\Service\Adapter\WithdrawHandleAdapterFactory::class
        ),
    )
];