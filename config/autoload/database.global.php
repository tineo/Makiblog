<?php
 return array(

 	'doctrine' => array(
        'connection' => array(
            'orm_default'=> array (
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                    'params' => array(
                    'host'     => 'ec2-54-227-239-195.compute-1.amazonaws.com',
                    'port'     => '5432',
                    'user'     => 'osychjfqxuiipv',
                    'password' => 'ysCO4rsZ4SXD8lZjN12JUq2bSC',
                    'dbname'   => 'dbnn35aemjdveo'
                )
            ),
            'orm_zfcuser' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '12077752',
                    'dbname'   => 'db_intranet',
                    'driverOptions' => array(
                        1002 => 'SET NAMES utf8'
                    ),
                )
            )
        ),

        'configuration' => array(
            'orm_default' => array(
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'driver'            => 'orm_default',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',
                'filters'           => array()
            ),
            'orm_zfcuser' => array(
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'driver'            => 'orm_zfcuser',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'DoctrineORMModule\Proxy',
                'filters'           => array()
            )
        ),

        'driver' => array(
            'Makiblog_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                     __DIR__ . '/../../module/Makiblog/src/Makiblog/Entity'
                )
            ),
            'ZfcUser_Driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                     __DIR__ . '/../../module/MakiUser/src/MakiUser/Entity'
                )
            ),

            'orm_default' => array(
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    'Makiblog\Entity' => 'Makiblog_driver',
                    'MakiUser\Entity' =>  'ZfcUser_Driver'
                )
            ),
            'orm_zfcuser' => array(
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    'MakiUser\Entity' =>  'ZfcUser_Driver'
                )
            ),
        ),

        'entitymanager' => array(            
            'orm_default' => array(
                'connection'    => 'orm_default',
                'configuration' => 'orm_default'
            ),
            'orm_zfcuser' => array(
                'connection'    => 'orm_zfcuser',
                'configuration' => 'orm_zfcuser'
            )
        ),

        'eventmanager' => array(
            'orm_default' => array(),
            'orm_zfcuser' => array()
        ),

        'sql_logger_collector' => array(
            'orm_default' => array(),
            'orm_zfcuser' => array()
        ),

        'entity_resolver' => array(
            'orm_default' => array(),
            'orm_zfcuser' => array()
        ),

    ),
	'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'MakiUser\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
    ),
);