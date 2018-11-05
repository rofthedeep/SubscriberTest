<?php

namespace SubscriberTest\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Models\Order\Basket;
use Zend_Date;

/**
 * handles ice flat in shopware basket
 *
 * Class BasketSubscriber
 * @package RmIce\Subscriber
 */
class BasketSubscriber implements SubscriberInterface
{

    /**
     * subscribe on events
     *
     * {@inheritdoc}
     */

    public static function getSubscribedEvents()
    {
        return [
            'sBasket::sUpdateArticle::after' => 'onUpdateArticle'
        ];
    }


    /**
     * @param \Enlight_Event_EventArgs $args
     */

    public function onUpdateArticle(\Enlight_Event_EventArgs $args)
    {
        error_log('in subscribed event: on update article');
    }
}