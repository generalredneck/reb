<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Rest\Controller\Index' => 'Rest\Controller\IndexController',
        ),
    ),
   'router' => array(
        'routes' => array(
            'rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/rest[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Rest\Controller\Index',
                    ),
                ),
            ),
        ),
    ),
);
