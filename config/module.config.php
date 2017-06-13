<?php
return [
    'router' => [
        'routes' => [
            'apigility-logic\\finance.rest.doctrine.ledger' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/apigility-logic/finance/ledger[/:ledger_id]',
                    'defaults' => [
                        'controller' => 'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller',
                    ],
                ],
            ],
            'apigility-logic\\finance.rest.doctrine.account' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/apigility-logic/finance/account[/:account_id]',
                    'defaults' => [
                        'controller' => 'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'apigility-logic\\finance.rest.doctrine.ledger',
            1 => 'apigility-logic\\finance.rest.doctrine.account',
        ],
    ],
    'zf-rest' => [
        'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller' => [
            'listener' => \ApigilityLogic\Finance\V1\Rest\Ledger\LedgerResource::class,
            'route_name' => 'apigility-logic\\finance.rest.doctrine.ledger',
            'route_identifier_name' => 'ledger_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'ledger',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\Ledger::class,
            'collection_class' => \ApigilityLogic\Finance\V1\Rest\Ledger\LedgerCollection::class,
            'service_name' => 'Ledger',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller' => [
            'listener' => \ApigilityLogic\Finance\V1\Rest\Account\AccountResource::class,
            'route_name' => 'apigility-logic\\finance.rest.doctrine.account',
            'route_identifier_name' => 'account_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'account',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\Account::class,
            'collection_class' => \ApigilityLogic\Finance\V1\Rest\Account\AccountCollection::class,
            'service_name' => 'Account',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller' => 'HalJson',
            'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller' => 'HalJson',
        ],
        'accept-whitelist' => [
            'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller' => [
                0 => 'application/vnd.apigility-logic\\finance.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller' => [
                0 => 'application/vnd.apigility-logic\\finance.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content-type-whitelist' => [
            'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller' => [
                0 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller' => [
                0 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ApigilityLogic\Finance\Doctrine\Entity\Ledger::class => [
                'route_identifier_name' => 'ledger_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.ledger',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\LedgerHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\Ledger\LedgerCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.ledger',
                'is_collection' => true,
            ],
            \ApigilityLogic\Finance\Doctrine\Entity\Account::class => [
                'route_identifier_name' => 'account_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.account',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\Account\\AccountHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\Account\AccountCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.account',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \ApigilityLogic\Finance\V1\Rest\Ledger\LedgerResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\LedgerHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\Account\AccountResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\Account\\AccountHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\LedgerHydrator' => [
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\Ledger::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Account\\AccountHydrator' => [
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\Account::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller' => [
            'input_filter' => 'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Validator',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller' => [
            'input_filter' => 'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Validator' => [
            0 => [
                'name' => 'amount_type',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'amount',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'balance',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'create_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 50,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'create_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'update_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
];
