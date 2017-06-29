<?php
namespace ApigilityLogic\Finance\Listener;
use ApigilityLogic\Finance\Doctrine\Entity\Withdraw;
use ApigilityLogic\Finance\Event\WithdrawEvent;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\ServiceManager\ServiceManager;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;

/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2017/6/27
 * Time: 9:40:08
 */
class WithdrawListener implements EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    protected $sharedListeners = [];

    private $sm;

    function __construct(ServiceManager $serviceManager)
    {
        $this->sm = $serviceManager;
    }

    /**
     * @param SharedEventManagerInterface $events
     */
    public function attachShared(SharedEventManagerInterface $events)
    {
        $listener_post =  $events->attach(
            'ZF\Apigility\Doctrine\DoctrineResource',
            DoctrineResourceEvent::EVENT_CREATE_POST,
            [$this, 'triggerWithdrawHandlingEvent']
        );

        $listener_patch =  $events->attach(
            'ZF\Apigility\Doctrine\DoctrineResource',
            DoctrineResourceEvent::EVENT_PATCH_POST,
            [$this, 'triggerWithdrawHandlingEvent']
        );

        $listener_fetch =  $events->attach(
            'ZF\Apigility\Doctrine\DoctrineResource',
            DoctrineResourceEvent::EVENT_FETCH_POST,
            [$this, 'triggerWithdrawFetchEvent']
        );

        if (! $listener_post) {
            $listener_post = [$this, 'triggerWithdrawHandlingEvent'];
        }

        if (! $listener_patch) {
            $listener_patch = [$this, 'triggerWithdrawHandlingEvent'];
        }

        if (! $listener_fetch) {
            $listener_fetch = [$this, 'triggerWithdrawFetchEvent'];
        }

        $this->sharedListeners[] = $listener_post;
        $this->sharedListeners[] = $listener_patch;
        $this->sharedListeners[] = $listener_fetch;
    }

    public function triggerWithdrawHandlingEvent(DoctrineResourceEvent $event)
    {
        if ($event->getEntity() instanceof Withdraw &&
            $event->getEntity()->getStatus() === Withdraw::STATUS_HANDLING  &&
            empty($event->getEntity()->getTransactionNumber())) {

            // 触发事件
            $withdraw_event = new WithdrawEvent(WithdrawEvent::EVENT_WITHDRAW_SWITCHED_TO_HANDLING, $this->sm);
            $withdraw_event->setTarget($this);
            $withdraw_event->setEntity($event->getEntity());
            $this->getEventManager()->triggerEvent($withdraw_event);
        }
    }

    public function triggerWithdrawFetchEvent(DoctrineResourceEvent $event)
    {
        if ($event->getEntity() instanceof Withdraw &&
            $event->getEntity()->getStatus() === Withdraw::STATUS_HANDLING  &&
            !empty($event->getEntity()->getTransactionNumber())) {

            // 触发事件
            $withdraw_event = new WithdrawEvent(WithdrawEvent::EVENT_WITHDRAW_FETCHING_HANDLING_ENTITY, $this->sm);
            $withdraw_event->setTarget($this);
            $withdraw_event->setEntity($event->getEntity());
            $this->getEventManager()->triggerEvent($withdraw_event);
        }
    }
}