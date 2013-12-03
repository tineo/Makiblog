<?php
namespace Makiblog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManagerInterface;

class IndexController extends AbstractActionController
{
   
    public function indexAction()
    {



        $viewModel = new ViewModel();
        /*if($this->params()->fromRoute('page')!=""){
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
        $viewModel->setVariables(array('entries' => $entries));*/
        //$viewModel->layout('/home/tineo/tineo.mobi/data/templates/fashionista/layout.html');
        return $viewModel;
    }
    public function pageAction()
    {
        $viewModel = new ViewModel();
        //$config = $this->getServiceLocator()->get('Config');
        //$viewModel->setVariables(array('config' => $config));
        //$this->setTemplate('/home/tineo/tineo.mobi/data/templates/fashionista/index.phtml');
        return $viewModel;
    }
}
