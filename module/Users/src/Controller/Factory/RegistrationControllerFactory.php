<?php
namespace Users\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Users\Controller\RegistrationController;

/**
 * This is the factory for RegistrationController. Its purpose is to instantiate the
 * controller and inject dependencies into it.
 */
class RegistrationControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $sessionContainer = $container->get('UserRegistration');
        
        // Instantiate the controller and inject dependencies
        return new RegistrationController($sessionContainer);
    }
}


