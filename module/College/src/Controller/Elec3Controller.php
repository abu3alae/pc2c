<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Elec3Controller extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'المقاومة الكهربائية - قانون أوم',
                'time' => 1,
                'link' => 'loi-ohm'
            ],
            [
                'id' => 2,
                'cours' => 'القدرة الكهربائية',
                'time' => 2,
                'link' => 'puissance'
            ],
            [
                'id' => 3,
                'cours' => 'الطاقة الكهربائية',
                'time' => 3,
                'link' => 'energie'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



