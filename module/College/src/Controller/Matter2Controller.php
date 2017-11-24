<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Matter2Controller extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'الهواء من حولنا',
                'time' => 2,
                'link' => 'air-qui-nous-entoure'
            ],
            [
                'id' => 2,
                'cours' => 'بعض خصائص الهواء و مكوناته',
                'time' => 1,
                'link' => 'proprietes-air'
            ],
            [
                'id' => 3,
                'cours' => 'الجزيئات و الذرات',
                'time' => 3,
                'link' => 'molecules-atomes'
            ],
            [
                'id' => 4,
                'cours' => 'الإحتراقات',
                'time' => 4,
                'link' => 'combution'
            ],
            [
                'id' => 5,
                'cours' => 'مفهوم التفاعل الكيميائي',
                'time' => 2,
                'link' => 'reaction'
            ],
            [
                'id' => 6,
                'cours' => 'قوانين التفاعل الكيميائي',
                'time' => 4,
                'link' => 'loi-reaction'
            ],
            [
                'id' => 7,
                'cours' => 'المواد الطبيعية',
                'time' => 2,
                'link' => 'matieres-natureles'
            ],
            [
                'id' => 8,
                'cours' => 'تلوث الهواء',
                'time' => 2,
                'link' => 'polution-air'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



