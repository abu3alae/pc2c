<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Matter1Controller extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'الماء',
                'time' => 2,
                'link' => 'water'
            ],
            [
                'id' => 2,
                'cours' => 'الخواص الفيزيائية للمادة',
                'time' => 2,
                'link' => 'etatsphysics'
            ],
            [
                'id' => 3,
                'cours' => 'الحجم - الكتلة - الكتلة الحجمية',
                'time' => 3,
                'link' => 'water'
            ],
            [
                'id' => 4,
                'cours' => 'الضغط و الضغط الجوي',
                'time' => 2,
                'link' => 'water'
            ],
            [
                'id' => 5,
                'cours' => 'النموذج الدقائقي للمادة',
                'time' => 1,
                'link' => 'water'
            ],
            [
                'id' => 6,
                'cours' => 'الحرارة و درجة الحرارة',
                'time' => 2,
                'link' => 'water'
            ],
            [
                'id' => 7,
                'cours' => 'تفسير التحولات الفيزيائية باعتماد النموذج الدقائقي',
                'time' => 2,
                'link' => 'water'
            ],
            [
                'id' => 8,
                'cours' => 'الخلائط',
                'time' => 2,
                'link' => 'water'
            ],
            [
                'id' => 9,
                'cours' => 'الجسم الخالص و مميزاته',
                'time' => 2,
                'link' => 'water'
            ],
            [
                'id' => 10,
                'cours' => 'معالجة المياه',
                'time' => 2,
                'link' => 'water'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
    
    public function waterAction() {
        return new ViewModel();
    }
}



