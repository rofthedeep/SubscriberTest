<?php

namespace SubscriberTest;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Shopware\Components\Logger;

/**
 * Class SubscriberTest
 * @package SubscriberTest
 */

class SubscriberTest extends Plugin
{

    /**
     * @param InstallContext $context
     */

    public function install(InstallContext $context)
    {
        // install
    }

    /**
     * @param UninstallContext $context
     */

    public function uninstall(UninstallContext $context)
    {
        // uninstall
    }

    /**
     * @param ContainerBuilder $container
     */

    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->setParameter('subscriber_test.plugin_dir', $this->getPath());
    }
}
