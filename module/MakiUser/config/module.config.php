<?php
return array(
	/*'doctrine' => array (
		'connection' => array (
			'orm_zfuser'=> array (
				'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
					'params' => array(
						'host'     => 'localhost',
						'port'     => '3306',
						'user'     => 'root',
						'password' => '12077752',
						'dbname'   => 'db_intranet'
				)
			),			
		),
		'driver' => array (
			'zfcuser_entity' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/MakiUser/Entity'
                ),
            ),
            'orm_zfuser' => array (
				'drivers' => array (
					'MakiUser\Entity' => 'zfcuser_entity',		
				) 
			),
		),
		'configuration' => array(
            // Configuration for service `doctrine.configuration.orm_shop` service
            'orm_zfuser' => array(
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'driver'            => 'orm_zfuser',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',
                // SQL filters.
                'filters'           => array()
            )
        ),
		'entitymanager' => array(
            // configuration for the `doctrine.entitymanager.orm_shop` service
            'orm_zfuser' => array(
                // connection instance to use. The retrieved service name will
                // be `doctrine.connection.$thisSetting`
                'connection'    => 'orm_zfuser',
 
                // configuration instance to use. The retrieved service name will
                // be `doctrine.configuration.$thisSetting`
                'configuration' => 'orm_zfuser'
            )
        ),
	),


	'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'MakiUser\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
    ),*/

);
