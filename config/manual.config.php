<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/30
 * Time: 16:32
 */
return [
    'zf-apigility-doctrine-query-create-filter' => [
        'factories' => [
            \ApigilityLogic\Finance\Doctrine\Query\CreateFilter\CardCreateFilter::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ApigilityLogic\Finance\Doctrine\Query\CreateFilter\WithdrawCreateFilter::class => \Zend\ServiceManager\Factory\InvokableFactory::class
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \ApigilityLogic\Finance\V1\Rest\CreditCard\CreditCardResource::class => [
                'query_create_filter' => \ApigilityLogic\Finance\Doctrine\Query\CreateFilter\CardCreateFilter::class,
            ],
            \ApigilityLogic\Finance\V1\Rest\CardWithdraw\CardWithdrawResource::class => [
                'query_create_filter' => \ApigilityLogic\Finance\Doctrine\Query\CreateFilter\WithdrawCreateFilter::class
            ]
        ],
    ],
    'apigility-logic' => [
        'finance' => [
            'withdraw' => [
                'adapter' => [
                    'enable' => false,
                    'type' => \ApigilityLogic\Finance\Service\Adapter\KekepayAdapter::class,
                    'options' => [
                        'pay_key' => '',
                        'pay_secret' => '',
                    ]
                ]
            ]
        ]
    ]
];