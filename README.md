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