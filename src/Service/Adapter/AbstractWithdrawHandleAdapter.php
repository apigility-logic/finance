<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 14:38:01
 */

namespace ApigilityLogic\Finance\Service\Adapter;


use Zend\ServiceManager\ServiceManager;

abstract class AbstractWithdrawHandleAdapter implements WithdrawHandleAdapterInterface
{
    protected $options;

    private $serviceManager;

    function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }
}