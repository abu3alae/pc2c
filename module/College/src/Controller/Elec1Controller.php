<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace College\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class Elec1Controller extends AbstractActionController
{
    /**
     * An action of menu college partial views.
     */
    public function indexAction() 
    {
        $menuItems = [
            [
                'id' => 1,
                'cours' => 'الكهرباء من حولنا',
                'time' => 1,
                'link' => 'electricite_qui_nous_entoure'
            ],
            [
                'id' => 2,
                'cours' => 'الدارة الكهربائية البسيطة',
                'time' => 3,
                'link' => 'circuit_electrique_simple'
            ],
            [
                'id' => 3,
                'cours' => 'أنواع التراكيب الكهربائية',
                'time' => 3,
                'link' => 'types_des_montages_electriques'
            ],
            [
                'id' => 4,
                'cours' => 'التيار الكهربائي المستمر',
                'time' => 3,
                'link' => 'courant_electrique_continu'
            ],
            [
                'id' => 5,
                'cours' => 'تأثير المقاومة على شدة التيار',
                'time' => 3,
                'link' => 'effet_resistance_intensite_courant'
            ],
            [
                'id' => 6,
                'cours' => 'قانون العقد - قانون إضافية التوترات',
                'time' => 4,
                'link' => 'loi_noeud_addition_tension'
            ],
            [
                'id' => 7,
                'cours' => 'الوقاية من أخطار التيار الكهربائي',
                'time' => 3,
                'link' => 'danger_intensity_courant'
            ]
        ];
        
        return new ViewModel([
            'menuItems' => $menuItems
        ]);
    }
}



