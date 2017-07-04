<?php
namespace ApigilityLogic\Finance;

use ApigilityLogic\Finance\Listener\LedgerServiceListener;
use ApigilityLogic\Finance\Listener\WithdrawListener;
use ApigilityLogic\Finance\Listener\WithdrawServiceListener;
use Zend\Config\Config;
use Zend\Mvc\MvcEvent;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        $doctrine_config = new Config(include __DIR__ . '/../config/doctrine.config.php');
        $service_config = new Config(include __DIR__ . '/../config/service.config.php');
        $manual_config = new Config(include __DIR__ . '/../config/manual.config.php');

        $module_config = new Config(include __DIR__ . '/../config/module.config.php');
        $module_config->merge($doctrine_config);
        $module_config->merge($service_config);
        $module_config->merge($manual_config);

        return $module_config;
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function onBootstrap(MvcEvent $e)
    {
        $app      = $e->getTarget();
        $services = $app->getServiceManager();
        $events   = $app->getEventManager();

        $sharedEvents = $events->getSharedManager();

        $withdraw_listener = new WithdrawListener($services);
        $withdraw_listener->attachShared($sharedEvents);

        $withdraw_service_listener = new WithdrawServiceListener();
        $withdraw_service_listener->attach($withdraw_listener->getEventManager());

        $ledger_service_listener = new LedgerServiceListener();
        $ledger_service_listener->attach($withdraw_listener->getEventManager());
    }
}
