<?php

return array(
	'bjyauthorize' => array(

		'default_role' => 'guest',

        'unauthorized_strategy' => 'BjyAuthorize\View\RedirectionStrategy',

        // Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entitymanager.orm_zfcuser',
                'role_entity_class' => 'MakiUser\Entity\Role',
            ),
        ),

        'guards' => array(
            
            'BjyAuthorize\Guard\Controller' => array(
                /*array('controller' => 'index', 'roles' => array('user')),
                array('controller' => 'index', 'action' => 'stuff', 'roles' => array('user')),
                // You can also specify an array of actions or an array of controllers (or both)
                // allow "guest" and "admin" to access actions "list" and "manage" on these "index",
                // "static" and "console" controllers
                array(
                    'controller' => array('index', 'static', 'console'),
                    'action' => array('list', 'manage'),
                    'roles' => array('guest', 'admin')
                ),
                array(
                    'controller' => array('search', 'administration'),
                    'roles' => array('guest', 'admin')
                ),
                */
            	array('controller' => 'zfcuser', 'roles' => array()),
                // Below is the default index action used by the ZendSkeletonApplication
                array('controller' => 'Makiblog\Controller\Index', 'roles' => array('guest')),
                array('controller' => 'Makiblog\Controller\Entry', 'roles' => array('guest')),

                array('controller' => 'Makiblog\Controller\Entry', 'roles' => array('guest')),
                array('controller' => 'Makiblog\Controller\Comment', 'roles' => array('guest')),
                array('controller' => 'Makiblog\Controller\Tag', 'roles' => array('guest')),
                array('controller' => 'Makiblog\Controller\Page', 'roles' => array('guest')),


                array('controller' => 'Makiblog\Controller\Dashboard', 'roles' => array('guest','user')),
            ),

            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'zfcuser', 'roles' => array()),
                array('route' => 'zfcuser/logout', 'roles' => array('user')),
                array('route' => 'zfcuser/login', 'roles' => array('guest')),
                array('route' => 'zfcuser/register', 'roles' => array('guest')),

                array('route' => 'pages', 'roles' => array('guest')),
                array('route' => 'application', 'roles' => array('guest')),
                array('route' => 'entry', 'roles' => array('guest')),
                array('route' => 'dashboard', 'roles' => array('user')),
                
            ),  
        ),
    ),
);