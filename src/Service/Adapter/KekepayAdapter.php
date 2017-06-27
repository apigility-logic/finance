<?php
namespace ApigilityLogic\Finance\Service\Adapter;

use ApigilityLogic\Finance\Doctrine\Entity\CardWithdraw;
use Exception;
use Zend\Http\Client;
use Zend\Http\Request;

/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 10:44:14
 */
class KekepayAdapter extends AbstractWithdrawHandleAdapter
{
    const API_URL_PAY = 'http://gateway.kekepay.com/accountProxyPay/initPay';
    const API_URL_CHECK = 'http://gateway.kekepay.com/proxyPayQuery/query';

    const BANK_ACCOUNT_TYPE_PUBLIC_ACCOUNT = 'PUBLIC_ACCOUNT';   // 对公帐号
    const BANK_ACCOUNT_TYPE_PRIVATE_DEBIT_ACCOUNT = 'PRIVATE_DEBIT_ACCOUNT'; // 私人借记卡

    /**
     * @inheritdoc
     * @param $withdraw CardWithdraw
     */
    public function handle($withdraw)
    {
        $sign_data = [
            'payKey' => $this->options['pay_key'],
            'outTradeNo' => $withdraw->getId(),
            'orderPrice' => $withdraw->getAmount(),
            'proxyType' => 'T0',
            'productType' => 'WEIXIN',
            'bankAccountType' => self::BANK_ACCOUNT_TYPE_PRIVATE_DEBIT_ACCOUNT,
            'phoneNo' => $withdraw->getCard()->getTel(),
            'receiverName' => $withdraw->getCard()->getName(),
            'certType' => 'IDENTITY',
            'certNo' => $withdraw->getCard()->getIdentityCardNumber(),
            'receiverAccountNo' => $withdraw->getCard()->getNumber(),
            'bankName' => $withdraw->getCard()->getBankName(),
            'bankBranchNo' => $this->getRandBankBranchNo()
        ];

        $post_data = $sign_data;

        ksort($sign_data);
        $sign_data['paySecret'] = $this->options['pay_secret'];

        $post_data['sign'] = md5(http_build_query($sign_data));

        $this->initPay($post_data);
    }

    private function initPay($data = null) {
        $request = new Request();
        $request->setUri(self::API_URL_PAY);
        $request->setMethod('POST');

        $headers = new \Zend\Http\Headers();
        $headers->addHeader(new \Zend\Http\Header\ContentType('application/json'))
            ->addHeader((new \Zend\Http\Header\Accept())->addMediaType('application/json'));
        $request->setHeaders($headers);

        $request->setContent(json_encode($data));

        $client = new Client();
        $client->setOptions(['timeout'=> 3600]);
        $response = $client->send($request);

        if (!$response->isSuccess()) {
            throw new Exception('接口请求失败');
        } else {
            error_log('Kekepay action: initPay success !!!' . $response->getBody());
            return $response;
        }
    }

    /**
     * 随机取一个行号，此值不
     * @return string
     */
    private function getRandBankBranchNo()
    {
        $data = [
            '001121013015',
            '001121013031',
            '001121013120',
            '001121013146',
            '001121013154',
            '001100011002',
            '001121013103',
            '001121013138',
            '001121013162',
            '001121013179',
        ];

        return $data[array_rand($data)];
    }
}