<?php

namespace Makiblog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class CommentController extends AbstractActionController
{
    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $controller = $this;
        // On dispatch check  entities and actions 
        $events->attach('dispatch', function ($e) use ($controller) {
            $controller->layout()->setVariable('mini', true); //minisidebar
            $controller->layout()->setTemplate('layout/dashboard');// Set dashboard layout 
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
        return $viewModel;
        
    }

}