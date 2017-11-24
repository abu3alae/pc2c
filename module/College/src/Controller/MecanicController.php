<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MecanicController extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'الحركة و السكون',
                'time' => 5,
                'link' => 'mouvement'
            ],
            [
                'id' => 2,
                'cours' => 'التأثيرات الميكانيكية - القوى',
                'time' => 2,
                'link' => 'actions-mecaniques'
            ],
            [
                'id' => 3,
                'cours' => 'مفهوم القوة',
                'time' => 2,
                'link' => 'force'
            ],
            [
                'id' => 4,
                'cours' => 'توازن جسم خاضع لقوتين',
                'time' => 2,
                'link' => 'equilibre'
            ],
            [
                'id' => 5,
                'cours' => 'الوزن و الكتلة',
                'time' => 2,
                'link' => 'poids'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



