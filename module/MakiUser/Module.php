<?php
namespace MakiUser;

class Module {
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



    public function onBootstrap( \Zend\Mvc\MvcEvent $mvcEvent )
        {
            $eventManager = $mvcEvent->getApplication()->getEventManager();
            $em           = $eventManager->getSharedManager();
            $em->attach(
                'ZfcUser\Form\RegisterFilter',
                'init',
                function($e) use($mvcEvent)
                {
                    $filter = $e->getTarget();          
                }
            );

            // custom form fields
            $em->attach(
                'ZfcUser\Form\Register',
                'init',
                function($e) use($mvcEvent)
                {
                    /* @var $form \ZfcUser\Form\Register */
                    $form = $e->getTarget();
                    $form->add(
                        array(
                            'name' => 'firstname',
                            'options' => array(
                                'label' => 'Nombres',
                            ),
                            'attributes' => array(
                                'type'  => 'text',
                            ),
                        )
                    );
                    $form->add(
                        array(
                            'name' => 'lastname',
                            'options' => array(
                                'label' => 'Apellidos',
                            ),
                            'attributes' => array(
                                'type'  => 'text',
                            ),
                        )
                    );
                }
            );

            // here's the storage bit
            $zfcServiceEvents = $mvcEvent->getApplication()->getServiceManager()->get('zfcuser_user_service')->getEventManager();

            $zfcServiceEvents->attach('register', function($e) use($mvcEvent) {
                $form = $e->getParam('form');
                $user = $e->getParam('user');
                /* @var $user \FooUser\Entity\User */
                //$user->setUsername(  $form->get('displayname')->getValue() );
                $user->setFirstname( $form->get('firstname')->getValue() );
                $user->setLastname( $form->get('lastname')->getValue() );
                /*$user->getIdSubarea( $form->get('id_subarea')->getValue() );
                $user->setAccesoExterno(0);
                $user->setDeleted(0);
                */
                $em = $mvcEvent->getApplication()->getServiceManager()->get('doctrine.entitymanager.orm_default');
                $config = $mvcEvent->getApplication()->getServiceManager()->get('config');
                $defaultUserRole = $em->getRepository('MakiUser\Entity\Role')->find(1);
                $user->addRole($defaultUserRole);
                $defaultUserRole = $em->getRepository('MakiUser\Entity\Role')->find(2);
                $user->addRole($defaultUserRole);

            });

            // you can even do stuff after it stores           
            $zfcServiceEvents->attach('register.post', function($e) use($mvcEvent) {
                /*$user = $e->getParam('user');*/
            });
        }



}