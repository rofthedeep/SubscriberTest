<?php

namespace SubscriberTest\Tests\Functional\Cart;

use Enlight_Controller_Request_RequestHttp;
use Shopware\Components\Random;

class SubscriberTest extends \Enlight_Components_Test_Plugin_TestCase
{
    const ARTICLE_NUMBER = 'SW10001';
    const USER_AGENT = 'Mozilla/5.0 (Android; Tablet; rv:14.0) Gecko/14.0 Firefox/14.0';

    public function testOne()
    {
        error_log('--- test one ---');
        $this->reset();
        Shopware()->Front()->setRequest(new Enlight_Controller_Request_RequestHttp());
        $this->generateBasketSession();
        $this->Request()->setMethod('POST');
        $this->Request()->setHeader('User-Agent', self::USER_AGENT);
        $this->Request()->setParam('sQuantity', 5);
        $this->Request()->setParam('sAdd', self::ARTICLE_NUMBER);
        $this->dispatch('/checkout/addArticle');
    }

    public function testTwo()
    {
        error_log('--- test two ---');
        $this->reset();
        Shopware()->Session()->offsetSet('sessionId', '');
        $this->generateBasketSession();
        $this->Request()->setMethod('POST');
        $this->Request()->setHeader('User-Agent', self::USER_AGENT);
        $this->Request()->setParam('sQuantity', 4);
        $this->Request()->setParam('sAdd', self::ARTICLE_NUMBER);
        $this->dispatch('/checkout/addArticle');
    }

    public function testThree()
    {
        error_log('--- test three ---');
        $this->reset();
        $this->resetRequest();
        Shopware()->Session()->offsetSet('sessionId', '');
        $this->generateBasketSession();
        $this->Request()->setMethod('POST');
        $this->Request()->setHeader('User-Agent', self::USER_AGENT);
        $this->dispatch('/checkout/shippingPayment');
    }

    private function generateBasketSession()
    {
        $this->reset();
        $sessionId = Random::getAlphanumericString(32);
        Shopware()->Session()->offsetSet('sessionId', $sessionId);
        return $sessionId;
    }
}
