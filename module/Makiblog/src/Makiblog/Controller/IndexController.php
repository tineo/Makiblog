<?php
namespace Makiblog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class IndexController extends AbstractActionController
{
    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $controller = $this;
        // On dispatch check  entities and actions 
        /*$events->attach('dispatch', function ($e) use ($controller) {
            $controller->layout()->setVariable('mini', true); //minisidebar
            $controller->layout()->setTemplate('layout/dashboard'); // Set dashboard layout 
        }, 100); // execute before executing action logic

        */
        // An array of configuration data is given
$configArray = array(
    'webhost'  => 'www.example.com',
    'database' => array(
        'adapter' => 'pdo_mysql',
        'params'  => array(
            'host'     => 'db.example.com',
            'username' => 'dbuser',
            'password' => 'secret',
            'dbname'   => 'mydatabase'
        )
    )
);

// Create the object-oriented wrapper using the configuration data
$config = new \Zend\Config\Config($configArray);


        return $this;
    }
    
    public function indexAction()
    {



        $viewModel = new ViewModel();
        if($this->params()->fromRoute('page')!=""){
            $template = 'makiblog/index/'.$this->params()->fromRoute('page');    
            $resolver = $this->getEvent()->getApplication()->getServiceManager()->get('Zend\View\Resolver\TemplatePathStack');
            
            if (false === $resolver->resolve($template)) {
                $this->getResponse()->setStatusCode(404); return;    
            }else{ return $viewModel->setTemplate($template); }
        }
    	$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    	$qb = $em->createQueryBuilder();
    	$qb->select('e')->from('Makiblog\Entity\Entry','e');
    	
    	$entries = $qb->getQuery()->getArrayResult();
        $viewModel->setVariables(array('entries' => $entries));
        return $viewModel;
    }
}
