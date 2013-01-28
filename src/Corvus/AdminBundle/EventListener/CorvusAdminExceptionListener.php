<?php

// src/Corvus/AdminBundle/EventListener/CorvusAdminExceptionListener.php
namespace Corvus\AdminBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Routing\Router;

use Twig_Environment as Twig;


class CorvusAdminExceptionListener
{
	private $twig;
	private $router;

	function __construct(Twig $twig, Router $router)
	{
		$this->twig = $twig;
		$this->router = $router;
	}

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
    	$request = $event->getRequest()->getRequestUri();
        $exception = $event->getException();

        // Customize your response object to display the exception details
        $response = new Response();

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
        	$response->setStatusCode($exception->getStatusCode());
            if($exception->getStatusCode() == 404)
            {
            	if(preg_match('#/admin/#', $request) == 1)  {
            		$response->setContent($this->twig->render('CorvusAdminBundle:Default:error404.html.twig', array('app' => $request)));
            	} else {
            		$response->setContent($this->twig->render('CorvusFrontendBundle:Default:error404.html.twig', array('app' => $request)));
            	}
            }
        } else {
            $response->setStatusCode(500);
        }

        $event->setResponse($response);
    }
}