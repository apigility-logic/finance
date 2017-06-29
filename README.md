# Apigility Finance 财务组件
提供记账功能。

## 概念

- `Customer` 客户是财务组件的业务中心，所有的业务都是针对特定客户而展开的。
- `Account` 一个客户可以有多个帐户
- `Ledger` 账务记录，每一条记录都属于特定的帐户
- `Card` 银行卡，每个客户都可以有1张或多张银行卡
- `CreditCard` 信用卡，是银行卡的一种
- `DebitCard` 借记卡，是银行卡的一种
- `Withdraw` 提现单，客户针对特定账户发起的一笔提现申请

> 以上每一个概念都对应一个数据库实体，请查看[Doctrine Entity](src/Doctrine/Entity)
来了解每一个实体的属性，以及各实体之间的关联关系。

## 提现单自动转账功能
可以配置提现单自动转账功能：
```php
<?php
return [
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
```
目前仅支持[Kekepay代付服务]()进行转帐，配置好后，会有如下作用：

- 在一个提现单状态切换为“处理中”（状态码为3）时，如果该提现单的 transaction_number 字段没有值，
那么此提现单会被认为还没有被自动转账处理过，并调用第三方服务发起转账请求，然后把返回的转账交易订单号
回填到提现单的 transaction_number 字段。
- 当一个提现单被读取时，如果状态为“处理中”（状态码为3），并且 transaction_number 字段有值，那么
会请求第三方服务的接口，查询该交易的最新状态。如果返回的状态是 “转账已完成”，那么把该提现单的状态改为
“已处理”（状态码10）。

## 扩展提现单自动转账功能
目前只有一个 KekepayAdapter，所以仅支持[Kekepay代付服务]()进行转帐。

如果你需要增加代付服务商支持，可以实现一个新的适配器，只需要继承 ApigilityLogic\Finance\Service\Adapter\AbstractWithdrawHandleAdapter
类即可。