<?php
namespace College;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'colmatter1' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/matter1[/:action]',
                    'defaults' => [
                        'controller' => Controller\Matter1Controller::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'colmatter2' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/matter2[/:action]',
                    'defaults' => [
                        'controller' => Controller\Matter2Controller::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'colmatter3' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/matter3[/:action]',
                    'defaults' => [
                        'controller' => Controller\Matter3Controller::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'colelec1' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/elctricity1[/:action]',
                    'defaults' => [
                        'controller' => Controller\Elec1Controller::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'colelec2' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/elctricity2[/:action]',
                    'defaults' => [
                        'controller' => Controller\Elec2Controller::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'colelec3' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/elctricity3[/:action]',
                    'defaults' => [
                        'controller' => Controller\Elec3Controller::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'coloptics' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/optics[/:action]',
                    'defaults' => [
                        'controller' => Controller\OpticsController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'colmeca' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/college/mecanic[/:action]',
                    'defaults' => [
                        'controller' => Controller\MecanicController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\Matter1Controller::class => InvokableFactory::class,
            Controller\Matter2Controller::class => InvokableFactory::class,
            Controller\Matter3Controller::class => InvokableFactory::class,
            Controller\Elec1Controller::class => InvokableFactory::class,
            Controller\Elec2Controller::class => InvokableFactory::class,
            Controller\Elec3Controller::class => InvokableFactory::class,
            Controller\OpticsController::class => InvokableFactory::class,
            Controller\MecanicController::class => InvokableFactory::class,
        ],
    ],
    'access_filter' => [
        'options' => [
            // The access filter can work in 'restrictive' (recommended) or 'permissive'
            // mode. In restrictive mode all controller actions must be explicitly listed 
            // under the 'access_filter' config key, and access is denied to any not listed 
            // action for not logged in users. In permissive mode, if an action is not listed 
            // under the 'access_filter' key, access to it is permitted to anyone (even for 
            // not logged in users. Restrictive mode is more secure and recommended to use.
            'mode' => 'restrictive'
        ],
        'controllers' => [
            Controller\Elec1Controller::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\Elec2Controller::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\Elec3Controller::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\Matter1Controller::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\Matter2Controller::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\Matter3Controller::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\OpticsController::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
            Controller\MecanicController::class => [
                // Allow anyone to visit "index" and "about" actions
                ['actions' => ['index'], 'allow' => '*']
            ],
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'College' => __DIR__ . '/../view',
        ],
    ],
];
