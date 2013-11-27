<?php
return array(
    'router' => array(
        'routes' => array(
            

            // Entries: using the path /entry/:id/:slug
            //I will config for SEO url for entries tomorrow
            'entry' => array(
                'type'    => 'Segment',
                'may_terminate' => true,
                'options' => array(
                    'route'    => '/entry[/:id[/:slug]]',
                    'constraints' => array(
                        'id'    => '[0-9]*',
                        'slug'  => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Makiblog\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
            ),
            // Dashboard: using the path /dashboard/:contoller/:action/:id
            'dashboard' => array(
                'type'    => 'Segment',
                'may_terminate' => true,
                'options' => array(
                    'route'    => '/dashboard[/:controller[/:action[/:id]]]',
                    'constraints' => array(
                        'id'          => '[0-9]*',
                        'controller'  => '[a-zA-Z0-9_-]*',
                        'action'      => '[a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Makiblog\Controller',
                        'controller'    => 'Dashboard',
                        'action'        => 'index',
                    ),
                ),
            ),
            // Pages: using /:page
            'pages' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/[:page]',
                    'constraints' => array(
                        'page'    => '(?!entry)(?!dashboard)[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'Makiblog\Controller',
                        'controller'    => 'Index',
                        'action'        => 'page',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Makiblog\Controller\Index' => 'Makiblog\Controller\IndexController',
            'Makiblog\Controller\Entry' => 'Makiblog\Controller\EntryController',
            'Makiblog\Controller\Comment' => 'Makiblog\Controller\CommentController',
            'Makiblog\Controller\Dashboard' => 'Makiblog\Controller\DashboardController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/dashboard'        => __DIR__ . '/../view/makiblog/dashboard/layout.phtml',
            'dashboard/entriesmenu'   => __DIR__ . '/../view/makiblog/dashboard/entriesmenu.phtml',
            'dashboard/sidebarmenu'   => __DIR__ . '/../view/makiblog/dashboard/sidebarmenu.phtml',

            'dashboard/entries/new'   => __DIR__ . '/../view/makiblog/dashboard/entries/new.phtml',
            "makiblog/entry/view"   => __DIR__ . '/../view/makiblog/dashboard/entry/view.phtml',
            'dashboard/entries/edit'   => __DIR__ . '/../view/makiblog/dashboard/entries/edit.phtml',

            'dashboard/comments/new'   => __DIR__ . '/../view/makiblog/dashboard/comments/new.phtml',
            "makiblog/comment/view"   => __DIR__ . '/../view/makiblog/dashboard/comment/view.phtml',
            'dashboard/comments/edit'   => __DIR__ . '/../view/makiblog/dashboard/comments/edit.phtml',

            'zfc-user/user/login'     => __DIR__ . '/../view/makiblog/dashboard/login.phtml',
            'makiblog/index/index'    => __DIR__ . '/../view/makiblog/index/index.phtml',
            'makiblog/entry/index'    => __DIR__ . '/../view/makiblog/entry/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'empty'                   => __DIR__ . '/../view/makiblog/dashboard/empty.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
