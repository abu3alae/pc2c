<?php
namespace Users\Service;

/**
 * This service is responsible for determining which items should be in the main menu.
 * The items may be different depending on whether the user is authenticated or not.
 */
class LoginManager
{
    /**
     * Auth service.
     * @var Zend\Authentication\Authentication
     */
    private $authService;
    
    /**
     * Url view helper.
     * @var Zend\View\Helper\Url
     */
    private $urlHelper;
    
    /**
     * Constructs the service.
     */
    public function __construct($authService, $urlHelper) 
    {
        $this->authService = $authService;
        $this->urlHelper = $urlHelper;
    }
    
    /**
     * This method returns menu items depending on whether user has logged in or not.
     */
    public function getMenuItems() 
    {
        $url = $this->urlHelper;
        $items = [];
        
        // Display "Login" menu item for not authorized user only. On the other hand,
        // display "Admin" and "Logout" menu items only for authorized users.
        if (!$this->authService->hasIdentity()) {
            $items[] = [
                'id' => 'login',
                'label' => 'تسجيل الدخول',
                'link' => $url('registration', ['action'=>'index'])
            ];
        } else {
            
            $items[] = [
                'id' => 'admin',
                'label' => 'Admin',
                'dropdown' => [
                    [
                        'id' => 'users',
                        'label' => 'Manage Users',
                        'link' => $url('users')
                    ]
                ]
            ];
            
            $items[] = [
                'id' => 'logout',
                'label' => $this->authService->getIdentity(),
                'float' => 'right',
                'dropdown' => [
                    [
                        'id' => 'settings',
                        'label' => 'Settings',
                        'link' => $url('application', ['action'=>'settings'])
                    ],
                    [
                        'id' => 'logout',
                        'label' => 'Sign out',
                        'link' => $url('logout')
                    ],
                ]
            ];
        }
        
        return $items;
    }
}


