<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Elec2Controller extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'التيار الكهربائي المتناوب الجيبي',
                'time' => 2,
                'link' => 'courant_alternatif'
            ],
            [
                'id' => 2,
                'cours' => 'التركيب الكهربائي المنزلي',
                'time' => 2,
                'link' => 'electricite_domistique'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



