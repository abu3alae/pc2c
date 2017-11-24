<?php
namespace Application\Service;

/**
 * This service is responsible for determining which items should be in the main menu.
 * The items may be different depending on whether the user is authenticated or not.
 */
class NavManager
{
    /**
     * Url view helper.
     * @var Zend\View\Helper\Url
     */
    private $urlHelper;
    
    /**
     * Constructs the service.
     */
    public function __construct($urlHelper) 
    {
        $this->urlHelper = $urlHelper;
    }
    
    /**
     * This method returns menu items depending on whether user has logged in or not.
     */
    public function getMenuItems() 
    {
        $url = $this->urlHelper;
        $items = [];
        
        $items[] = [
            'id' => 'home',
            'label' => 'home-icon',
            'link' => $url('home')
        ];
        
        $items[] = [
            'id' => 'college',
            'label' => 'إعدادي',
            'subitem'=>[
                [
                    'id'=>'cn1',
                    'label'=>'الأولى إعدادي',
                    'submenu'=>[
                        [
                            'id'=>'matter1',
                            'label'=>'المادة',
                            'link'=> $url('colmatter1')
                        ],
                        [
                            'id'=>'electricity1',
                            'label'=>'الكهرباء',
                            'link'=> $url('colelec1')
                        ]
                    ]
                ],
                [
                    'id'=>'cn2',
                    'label'=>'الثانية إعدادي',
                    'submenu'=>[
                        [
                            'id'=>'matter2',
                            'label'=>'المادة',
                            'link'=> $url('colmatter2')
                        ],
                        [
                            'id'=>'optic',
                            'label'=>'الضوء',
                            'link'=> $url('coloptics')
                        ],
                        [
                            'id'=>'electricity2',
                            'label'=>'الكهرباء',
                            'link'=> $url('colelec2')
                        ]
                    ],
                ],
                [
                    'id'=>'cn3',
                    'label'=>'الثالثة إعدادي',
                    'submenu'=>[
                        [
                            'id'=>'matter3',
                            'label'=>'المادة',
                            'link'=> $url('colmatter3')
                        ],
                        [
                            'id'=>'mechanic',
                            'label'=>'الميكانيك',
                            'link'=> $url('colmeca')
                        ],
                        [
                            'id'=>'electricity3',
                            'label'=>'الكهرباء',
                            'link'=> $url('colelec3')
                        ]
                    ]
                ]
            ]
        ];
        $items[] = [
            'id' =>'tc',
            'label' =>'جذع مشترك',
            'subitem'=>[
                [
                    'id'=>'chimictc',
                    'label'=>'الكيمياء',
                    'submenu'=>[
                        [
                            'id'=>'course1ctc',
                            'label'=>'الأنواع الكيميائية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course2ctc',
                            'label'=>'بنية الذرة و هندسة بعض الجزيئات',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course3ctc',
                            'label'=>'كمية المادة',
                            'link'=> $url('home')
                        ]
                    ]
                ],
                [
                    'id'=>'physictc',
                    'label'=>'الفيزياء',
                    'submenu'=>[
                        [
                            'id'=>'course1ptc',
                            'label'=>'الميكانيك',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course2ptc',
                            'label'=>'الكهرباء',
                            'link'=> $url('home')
                        ]
                    ]
                ]                           
            ]  
        ];
        $items[] = [
            'id' =>'bac1',
            'label' =>'1 باك',
            'subitem'=>[
                [
                    'id'=>'chimic1bac',
                    'label'=>'الكيمياء',
                    'submenu'=>[
                        [
                            'id'=>'course1cb1',
                            'label'=>'القياس في الكيمياء',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course2cb1',
                            'label'=>'الكيمياء العضوية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course3cb1',
                            'label'=>'الطاقة في الحياة اليومية',
                            'link'=> $url('home')
                        ]
                    ]
                ],
                [
                    'id'=>'physic1bac',
                    'label'=>'الفيزياء',
                    'submenu'=>[
                        [
                            'id'=>'course1pb1',
                            'label'=>'الشغل الميكانيكي و الطاقة',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course2pb1',
                            'label'=>'الكهرباء التحريكية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course3pb1',
                            'label'=>'البصريات',
                            'link'=> $url('home')
                        ]
                    ]
                ]                           
            ]  
        ];
        $items[] = [
            'id' =>'bac2',
            'label' =>'2 باك',
            'subitem'=>[
                [
                    'id'=>'chimic2bac',
                    'label'=>'الكيمياء',
                    'submenu'=>[
                        [
                            'id'=>'course1cb2',
                            'label'=>'التحولات السريعة و التحولات البطيئة لمجموعة كيميائية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course2cb2',
                            'label'=>'التحولات غير الكلية لمجموعة كيميائية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course3cb2',
                            'label'=>'منحى تطور مجموعة كيميائية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course4cb2',
                            'label'=>'كيفية التحكم في مجموعة كيميائية',
                            'link'=> $url('home')
                        ]
                    ]
                ],
                [
                    'id'=>'physic2bac',
                    'label'=>'الفيزياء',
                    'submenu'=>[
                        [
                            'id'=>'course1pb2',
                            'label'=>'الموجات',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course2pb2',
                            'label'=>'التحولات النووية',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course3pb2',
                            'label'=>'الكهرباء',
                            'link'=> $url('home')
                        ],
                        [
                            'id'=>'course4pb2',
                            'label'=>'الميكانيك',
                            'link'=> $url('home')
                        ]
                    ]
                ]                           
            ]  
        ];
        return $items;
    }
}


