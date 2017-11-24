<?php
namespace Users\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Users\View\Helper\LoginNav;
use Users\Service\LoginManager;

/**
 * This is the factory for Menu view helper. Its purpose is to instantiate the
 * helper and init menu items.
 */
class LoginNavFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $LoginManager = $container->get(LoginManager::class);
        
        // Get menu items.
        $items = $LoginManager->getMenuItems();
        
        // Instantiate the helper.
        return new LoginNav($items);
    }
}

