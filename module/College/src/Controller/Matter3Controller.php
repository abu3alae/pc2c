<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Matter3Controller extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'أمثلة لبعض المواد المستعملة في حياتنا اليومية',
                'time' => 2,
                'link' => 'example-matieres'
            ],
            [
                'id' => 2,
                'cours' => 'المواد و الكهرباء',
                'time' => 4,
                'link' => 'matiere-electricite'
            ],
            [
                'id' => 3,
                'cours' => 'تفاعلات بعض المواد مع الهواء',
                'time' => 4,
                'link' => 'reaction-air'
            ],
            [
                'id' => 4,
                'cours' => 'تفاعلات بعض المواد مع المحاليل',
                'time' => 8,
                'link' => 'reaction-solution'
            ],
            [
                'id' => 5,
                'cours' => 'خطورة بعض المواد المستعملة في حياتنا اليومية على الصحة و البيئة',
                'time' => 2,
                'link' => 'danger'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



