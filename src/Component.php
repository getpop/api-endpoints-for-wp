<?php

declare(strict_types=1);

namespace PoP\APIEndpointsForWP;

use PoP\Root\Component\AbstractComponent;
use PoP\APIEndpointsForWP\EndpointHandler;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    // const VERSION = '0.1.0';

    public static function getDependedComponentClasses(): array
    {
        return [
            \PoP\APIEndpoints\Component::class,
        ];
    }

    /**
     * All conditional component classes that this component depends upon, to initialize them
     *
     * @return array
     */
    public static function getDependedConditionalComponentClasses(): array
    {
        return [
            \PoP\RESTAPI\Component::class,
            \PoP\GraphQLAPI\Component::class,
        ];
    }

    /**
     * Initialize services
     */
    protected static function doInitialize(array $configuration = [], bool $skipSchema = false): void
    {
        parent::doInitialize($configuration, $skipSchema);
        ComponentConfiguration::setConfiguration($configuration);
    }

    /**
     * Boot component
     *
     * @return void
     */
    public static function beforeBoot(): void
    {
        parent::beforeBoot();

        // Initialize services
        (new EndpointHandler())->initialize();
    }
}
