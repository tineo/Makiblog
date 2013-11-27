<?php
namespace Makiblog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class DashboardController extends AbstractActionController
{

    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $controller = $this;
        /* On dispatch check  entities and actions */
        $events->attach('dispatch', function ($e) use ($controller) {
            $entity = $e->getRouteMatch()->getParam('entity');
            $action = $e->getRouteMatch()->getParam('action');
            /* Set dashboard layout */
            $controller->layout()->setTemplate('layout/dashboard');
            /* check my entity before */
            if( in_array($entity, array("entries","comments") ) ){
                if(empty($action)||$action == "index"){ 
                    $controller->plugin('redirect')->toRoute('dashboard', array("entity" => $entity ,"action" =>'view') ); 
                }
                $controller->layout()->setVariable('mini', true);
            }else{
                if(!empty($entity)) $controller->getResponse()->setStatusCode(404);
            }
        }, 100); // execute before executing action logic

        return $this;
    }

	public function indexAction()
    { 
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function viewAction()
    {
        $viewModel = new ViewModel();
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
        return $viewModel->setTemplate('dashboard/'.$entity.'/view');
        
    }

    public function newAction()
    {
        $viewModel = new ViewModel();
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
    	return $viewModel->setTemplate('dashboard/'.$entity.'/new');
    }

    public function editAction()
    {
        $viewModel = new ViewModel();
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
        return $viewModel->setTemplate('dashboard/'.$entity.'/edit');
        
    }

    public function deleteAction()
    {
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
    }

    public function notFoundAction(){
        /* Redireccionar cualquier accion al view ;D */
        $entity = $this->getEvent()->getRouteMatch()->getParam('entity');
        return $this->redirect()->toRoute('dashboard', array("entity" => $entity ,"action" =>'view') );
    }
}