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
            'apigility-logic\\finance.rest.doctrine.card-withdraw' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/apigility-logic/finance/card-withdraw[/:card_withdraw_id]',
                    'defaults' => [
                        'controller' => 'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Controller',
                    ],
                ],
            ],
            'apigility-logic\\finance.rest.doctrine.credit-card' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/apigility-logic/finance/credit-card[/:credit_card_id]',
                    'defaults' => [
                        'controller' => 'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Controller',
                    ],
                ],
            ],
            'apigility-logic\\finance.rest.doctrine.debit-card' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/apigility-logic/finance/debit-card[/:debit_card_id]',
                    'defaults' => [
                        'controller' => 'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Controller',
                    ],
                ],
            ],
            'apigility-logic\\finance.rest.doctrine.card' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/apigility-logic/finance/card[/:card_id]',
                    'defaults' => [
                        'controller' => 'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'apigility-logic\\finance.rest.doctrine.ledger',
            1 => 'apigility-logic\\finance.rest.doctrine.account',
            2 => 'apigility-logic\\finance.rest.doctrine.card-withdraw',
            3 => 'apigility-logic\\finance.rest.doctrine.credit-card',
            4 => 'apigility-logic\\finance.rest.doctrine.debit-card',
            5 => 'apigility-logic\\finance.rest.doctrine.card',
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
        'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Controller' => [
            'listener' => \ApigilityLogic\Finance\V1\Rest\CardWithdraw\CardWithdrawResource::class,
            'route_name' => 'apigility-logic\\finance.rest.doctrine.card-withdraw',
            'route_identifier_name' => 'card_withdraw_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'card_withdraw',
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
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\CardWithdraw::class,
            'collection_class' => \ApigilityLogic\Finance\V1\Rest\CardWithdraw\CardWithdrawCollection::class,
            'service_name' => 'CardWithdraw',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Controller' => [
            'listener' => \ApigilityLogic\Finance\V1\Rest\CreditCard\CreditCardResource::class,
            'route_name' => 'apigility-logic\\finance.rest.doctrine.credit-card',
            'route_identifier_name' => 'credit_card_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'credit_card',
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
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\CreditCard::class,
            'collection_class' => \ApigilityLogic\Finance\V1\Rest\CreditCard\CreditCardCollection::class,
            'service_name' => 'CreditCard',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Controller' => [
            'listener' => \ApigilityLogic\Finance\V1\Rest\DebitCard\DebitCardResource::class,
            'route_name' => 'apigility-logic\\finance.rest.doctrine.debit-card',
            'route_identifier_name' => 'debit_card_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'debit_card',
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
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\DebitCard::class,
            'collection_class' => \ApigilityLogic\Finance\V1\Rest\DebitCard\DebitCardCollection::class,
            'service_name' => 'DebitCard',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Controller' => [
            'listener' => \ApigilityLogic\Finance\V1\Rest\Card\CardResource::class,
            'route_name' => 'apigility-logic\\finance.rest.doctrine.card',
            'route_identifier_name' => 'card_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'card',
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
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\Card::class,
            'collection_class' => \ApigilityLogic\Finance\V1\Rest\Card\CardCollection::class,
            'service_name' => 'Card',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ApigilityLogic\\Finance\\V1\\Rest\\Ledger\\Controller' => 'HalJson',
            'ApigilityLogic\\Finance\\V1\\Rest\\Account\\Controller' => 'HalJson',
            'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Controller' => 'HalJson',
            'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Controller' => 'HalJson',
            'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Controller' => 'HalJson',
            'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Controller' => 'HalJson',
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
            'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Controller' => [
                0 => 'application/vnd.apigility-logic\\finance.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Controller' => [
                0 => 'application/vnd.apigility-logic\\finance.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Controller' => [
                0 => 'application/vnd.apigility-logic\\finance.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Controller' => [
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
            'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Controller' => [
                0 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Controller' => [
                0 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Controller' => [
                0 => 'application/json',
            ],
            'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Controller' => [
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
            \ApigilityLogic\Finance\Doctrine\Entity\CardWithdraw::class => [
                'route_identifier_name' => 'card_withdraw_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.card-withdraw',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\CardWithdrawHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\CardWithdraw\CardWithdrawCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.card-withdraw',
                'is_collection' => true,
            ],
            \ApigilityLogic\Finance\Doctrine\Entity\CreditCard::class => [
                'route_identifier_name' => 'credit_card_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.credit-card',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\CreditCardHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\CreditCard\CreditCardCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.credit-card',
                'is_collection' => true,
            ],
            \ApigilityLogic\Finance\Doctrine\Entity\DebitCard::class => [
                'route_identifier_name' => 'debit_card_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.debit-card',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\DebitCardHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\DebitCard\DebitCardCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.debit-card',
                'is_collection' => true,
            ],
            \ApigilityLogic\Finance\Doctrine\Entity\Card::class => [
                'route_identifier_name' => 'card_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.card',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\Card\\CardHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\Card\CardCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-logic\\finance.rest.doctrine.card',
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
            \ApigilityLogic\Finance\V1\Rest\CardWithdraw\CardWithdrawResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\CardWithdrawHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\CreditCard\CreditCardResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\CreditCardHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\DebitCard\DebitCardResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\DebitCardHydrator',
            ],
            \ApigilityLogic\Finance\V1\Rest\Card\CardResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'ApigilityLogic\\Finance\\V1\\Rest\\Card\\CardHydrator',
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
        'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\CardWithdrawHydrator' => [
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\CardWithdraw::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\CreditCardHydrator' => [
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\CreditCard::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\DebitCardHydrator' => [
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\DebitCard::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Card\\CardHydrator' => [
            'entity_class' => \ApigilityLogic\Finance\Doctrine\Entity\Card::class,
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
        'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Controller' => [
            'input_filter' => 'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Validator',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Controller' => [
            'input_filter' => 'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Validator',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Controller' => [
            'input_filter' => 'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Validator',
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Controller' => [
            'input_filter' => 'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Validator',
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
        'ApigilityLogic\\Finance\\V1\\Rest\\CardWithdraw\\Validator' => [
            0 => [
                'name' => 'amount',
                'required' => true,
                'filters' => [],
                'validators' => [],
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
            3 => [
                'name' => 'status',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\CreditCard\\Validator' => [
            0 => [
                'name' => 'bank_name',
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
            2 => [
                'name' => 'create_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'update_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'tel',
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
                            'max' => 20,
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'number',
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
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'identity_card_number',
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
                            'max' => 255,
                        ],
                    ],
                ],
            ],
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\DebitCard\\Validator' => [
            0 => [
                'name' => 'bank_name',
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
            2 => [
                'name' => 'create_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'update_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'tel',
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
                            'max' => 20,
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'number',
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
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'identity_card_number',
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
                            'max' => 255,
                        ],
                    ],
                ],
            ],
        ],
        'ApigilityLogic\\Finance\\V1\\Rest\\Card\\Validator' => [
            0 => [
                'name' => 'bank_name',
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
            2 => [
                'name' => 'create_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'update_time',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'tel',
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
                            'max' => 20,
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'number',
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
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'identity_card_number',
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
                            'max' => 255,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
