<?php

namespace Corvus\CoreBundle\EventListener;

class ControllerListener
{
    /* @var $templating \Symfony\Component\Templating */
    protected $templating;
    protected $templateChoice;

    public function __construct($templateChoice)
    {
        $this->templateChoice = $templateChoice;
    }

    public function setTemplatingEngine($templating)
    {
        $this->templating = $templating;
    }
    
    public function preExecute(\Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent $event)
    {
        // Get the results returned from the Controller
        $controllerResult = $event->getControllerResult();
        
        // Get the Template details from the Template annotation
        $request = $event->getRequest();
        $template = $request->get('_template');

        // Set the Controller to the Chosen Template
        if ($template->get('bundle') === 'CorvusFrontendBundle') {
            
            $template->set('controller', $this->templateChoice);
        }
        
        if ($template->get('bundle') === 'CorvusAdminBundle') {
            $template->set('controller', 'Default');
        }        

        // Now render the chosen Template and set the Controller response to a response object with the data
        $response = $this->templating->renderResponse($template, $controllerResult);

        $event->setResponse($response);
    }
}
