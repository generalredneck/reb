<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Rest\Controller\index' => 'Rest\Controller\IndexController',
        ),
    ),
   'router' => array(
        'routes' => array(
            'rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/rest',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Rest\Controller',
                        'controller' => 'Index',
                    ),
                ),
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:uuid]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[A-Fa-f0-9]{8}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{12}',
                            ),
                        ),
                    ),
                    'action' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
