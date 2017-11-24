<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OpticsController extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'الضوء من حولنا',
                'time' => 1,
                'link' => 'lumiere-qui-nous-entoure'
            ],
            [
                'id' => 2,
                'cours' => 'منابع الضوء و مستقبلاته',
                'time' => 2,
                'link' => 'sources'
            ],
            [
                'id' => 3,
                'cours' => 'الضوء و الألوان - تبدد الضوء',
                'time' => 2,
                'link' => 'dispertion'
            ],
            [
                'id' => 4,
                'cours' => 'إنتشار الضوء',
                'time' => 2,
                'link' => 'propagation'
            ],
            [
                'id' => 5,
                'cours' => 'تطبيقات الإنتشار المستقيمي للضوء',
                'time' => 3,
                'link' => 'applications-propagation'
            ],
            [
                'id' => 6,
                'cours' => 'العدسات الرقيقة',
                'time' => 4,
                'link' => 'lentilles'
            ],
            [
                'id' => 7,
                'cours' => 'تطبيقات: دراسة بعض الأجهزة البصرية',
                'time' => 2,
                'link' => 'appareils'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



