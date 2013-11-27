<?php

namespace Makiblog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class EntryController extends AbstractActionController
{
    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $controller = $this;
        // On dispatch check  entities and actions 
        $events->attach('dispatch', function ($e) use ($controller) {
            $controller->layout()->setVariable('mini', true); //minisidebar
            $controller->layout()->setTemplate('layout/dashboard'); // Set dashboard layout 
        }, 100); // execute before executing action logic

        return $this;
    }

    public function indexAction()
    {

        
        //$this->layout()->setTemplate('layout/dashboard');
    	$viewModel = new ViewModel();
  	    $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    	$qb = $em->createQueryBuilder();
    	$qb->select('e')->from('Makiblog\Entity\Entry','e');
        
        if($this->params()->fromRoute('id')!=""){
            $qb->where('e.idEntry = :id');
            $qb->setParameter('id',$this->params()->fromRoute('id'));
        }
        $entries = $qb->getQuery()->getArrayResult();
        if(!$entries){
            $this->getResponse()->setStatusCode(404);
            return;
        }else{
            $viewModel->setVariables(array('entries' => $entries)); 
        }
        return $viewModel;
        
    }
    public function viewAction()
    {

    }
}