<?php
namespace Makiblog;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\ControllerManager;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function init(ModuleManager $moduleManager)
    {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach('ZfcUser', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controller->layout('empty');
        }, 100);
    }

    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'doctrine.connection.orm_zfcuser'           => new \DoctrineORMModule\Service\DBALConnectionFactory('orm_zfcuser'),
                'doctrine.configuration.orm_zfcuser'        => new \DoctrineORMModule\Service\ConfigurationFactory('orm_zfcuser'),
                'doctrine.entitymanager.orm_zfcuser'        => new \DoctrineORMModule\Service\EntityManagerFactory('orm_zfcuser'),

                'doctrine.driver.orm_zfcuser'               => new \DoctrineModule\Service\DriverFactory('orm_zfcuser'),
                'doctrine.eventmanager.orm_zfcuser'         => new \DoctrineModule\Service\EventManagerFactory('orm_zfcuser'),
                'doctrine.entity_resolver.orm_zfcuser'      => new \DoctrineORMModule\Service\EntityResolverFactory('orm_zfcuser'),
                'doctrine.sql_logger_collector.orm_zfcuser' => new \DoctrineORMModule\Service\EntityResolverFactory('orm_zfcuser'),

                'DoctrineORMModule\Form\Annotation\AnnotationBuilder' => function(\Zend\ServiceManager\ServiceLocatorInterface $sl) {
                    return new \DoctrineORMModule\Form\Annotation\AnnotationBuilder($sl->get('doctrine.entitymanager.orm_zfcuser'));
                },
            ),
        );
    }


}
