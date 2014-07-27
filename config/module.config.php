<?php
namespace Common;

return [
    'controller_plugins' => [
        'invokables' => [
            'referer'  => 'Common\Controller\Plugin\RefererProvider',
            'redirect' => 'Common\Controller\Plugin\RedirectHelper'
        ]
    ],
    'route_manager'      => [
        'invokables' => [
            'slashable' => __NAMESPACE__ . '\Router\Slashable'
        ]
    ],
    'service_manager'    => [
        'factories' => [
            __NAMESPACE__ . '\Hydrator\HydratorPluginAwareDoctrineObject' => __NAMESPACE__ . '\Factory\HydratorPluginAwareDoctrineObjectFactory',
            __NAMESPACE__ . '\Hydrator\HydratorPluginManager'             => __NAMESPACE__ . '\Factory\HydratorPluginManagerFactory',
            'doctrine.cache.apccache'                                     => __NAMESPACE__ . '\Factory\ApcCacheFactory'
        ]
    ]
];
