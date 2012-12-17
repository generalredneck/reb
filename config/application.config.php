<?php
return array(
    'modules' => array(
        'Application',
        'Rest',
        // 3rd party modules
        'DoctrineModule',
        'DoctrineORMModule',
        'CdliUserProfile',
        'ZfcBase',
        'ZfcUser',
        'ZfcUserDoctrineORM',
        'ZfcRbac',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
