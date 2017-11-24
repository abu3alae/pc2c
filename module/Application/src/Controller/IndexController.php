<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mvc\MvcEvent;
use Application\Service\MailSender;
use Application\Form\ContactForm;

class IndexController extends AbstractActionController
{
    /**
     * Mail sender.
     * @var Application\Service\MailSender
     */
    private $mailSender;
    
    /**
     * Constructor.
     */
    public function __construct($mailSender) 
    {
        $this->mailSender = $mailSender;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    /**
     * This action displays the Contact Us page.
     */
    public function contactUsAction() 
    {   
        // Create Contact Us form
        $form = new ContactForm();
        
        // Check if user has submitted the form
        if($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost();            
            
            $form->setData($data);
            
            // Validate form
            if($form->isValid()) {
                
                // Get filtered and validated data
                $data = $form->getData();
                $email = $data['email'];
                $subject = $data['subject'];
                $body = $data['body'];
                
                // Send E-mail
                if(!$this->mailSender->sendMail('abu3alae@gmail.com', $email, 
                        $subject, $body)) {
                    // In case of error, redirect to "Error Sending Email" page
                    return $this->redirect()->toRoute('application', 
                            ['action'=>'sendError']);
                }
                
                // Redirect to "Thank You" page
                return $this->redirect()->toRoute('application', 
                        ['action'=>'thankYou']);
            }               
        } 
        
        // Pass form variable to view
        return new ViewModel([
            'form' => $form
        ]);
    }
    
    /**
     * This action displays the Thank You page. The user is redirected to this
     * page on successful mail delivery.
     */
    public function thankYouAction() 
    {
        return new ViewModel();
    }
    
    /**
     * This action displays the Send Error page. The user is redirected to this
     * page on mail delivery error.
     */
    public function sendErrorAction() 
    {
        return new ViewModel();
    }

    // Setting Layout for all Actions  of Controller
    public function onDispatch(MvcEvent $e) {
        $response = parent::onDispatch($e);
        // Set alternative Layout (layout2)
        $this->layout()->setTemplate('layout/layout2');
        return $response;
    }
}
