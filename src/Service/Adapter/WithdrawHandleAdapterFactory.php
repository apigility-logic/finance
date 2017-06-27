<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 13:56:01
 */

namespace ApigilityLogic\Finance\Service\Adapter;


use Zend\ServiceManager\ServiceManager;

class WithdrawHandleAdapterFactory
{
    /**
     * @var AbstractWithdrawHandleAdapter
     */
    private $adapter;

    public function __invoke(ServiceManager $services)
    {
        $config = $services->get('config');
        $adapter_config = $config['apigility-logic']['finance']['withdraw']['adapter'];

        if ($adapter_config['enable']) {
            $this->adapter = new $adapter_config['type']($services);
            $this->adapter->setOptions($adapter_config['options']);
            return $this->adapter;
        } else {
            return null;
        }
    }
}