<?php
return array(
    'zfcrbac' => array(
        'firewallroute' => TRUE,
        'firewalls' => array(
            'ZfcRbac\Firewall\Controller' => array(
                array('controller' => 'index', 'actions' => 'index', 'roles' => 'guest')
            ),
            'ZfcRbac\Firewall\Route' => array(
                array('route' => 'user/profile', 'roles' => 'member'),
                array('route' => 'admin/*', 'roles' => 'administrator')
            ),
        ),
        'providers' => array(
            'ZfcRbac\Provider\AdjacencyList\Role\DoctrineDbal' => array(
                'connection' => 'doctrine.connection.orm_default',
                'options' => array(
                    'table'         => 'rbac_role',
                    'id_column'     => 'role_id',
                    'name_column'   => 'role_name',
                    'join_column'   => 'parent_role_id'
                )
            ),
            'ZfcRbac\Provider\Generic\Permission\DoctrineDbal' => array(
                'connection' => 'doctrine.connection.orm_default',
                'options' => array(
                    'permission_table'      => 'rbac_permission',
                    'role_table'            => 'rbac_role',
                    'role_join_table'       => 'rbac_role_permission',
                    'permission_id_column'  => 'perm_id',
                    'permission_join_column'=> 'perm_id',
                    'role_id_column'        => 'role_id',
                    'role_join_column'      => 'role_id',
                    'permission_name_column'=> 'perm_name',
                    'role_name_column'      => 'role_name'
                )
            ),
        ),
        'identity_provider' => 'standard_identity'
    ),
    'service_manager' => array(
        'factories' => array(
            'standard_identity' => function ($sm) {
                $auth = $sm->get('zfcuser_auth_service');
                if ($auth->hasIdentity()) {
                    print_r($auth->getIdentity());
                    $roles = array('member');
                }
                else {
                    $roles = array('guest');
                }
                $identity = new \ZfcRbac\Identity\StandardIdentity($roles);
                return $identity;
            },
        )
    ),
);
