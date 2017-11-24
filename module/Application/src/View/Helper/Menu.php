<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * This view helper class displays a menu bar.
 */
class Menu extends AbstractHelper 
{
    /**
     * Menu items array.
     * @var array 
     */
    protected $items = [];
    
    /**
     * Active item's ID.
     * @var string  
     */
    protected $activeItemId = '';
    
    /**
     * Constructor.
     * @param array $items Menu items.
     */
    public function __construct($items=[]) 
    {
        $this->items = $items;
    }
    
    /**
     * Sets menu items.
     * @param array $items Menu items.
     */
    public function setItems($items) 
    {
        $this->items = $items;
    }
    
    /**
     * Sets ID of the active items.
     * @param string $activeItemId
     */
    public function setActiveItemId($activeItemId) 
    {
        $this->activeItemId = $activeItemId;
    }
    
    /**
     * Renders the menu.
     * @return string HTML code of the menu.
     */
    public function render() 
    {
        if (count($this->items)==0)
            return ''; // Do nothing if there are no items.
        
        $result ='<ul id="bloc1">';
        
        // Render items
        foreach ($this->items as $item) {
            $result .= $this->renderItem($item);
        }
        
        $result .='</ul>';
        
        return $result;
        
    }
    
    /**
     * Renders an item.
     * @param array $item The menu item info.
     * @return string HTML code of the item.
     */
    protected function renderItem($item) 
    {
        $id = isset($item['id']) ? $item['id'] : '';
        $isActive = ($id==$this->activeItemId);
        $label = isset($item['label']) ? $item['label'] : '';
             
        $result = ''; 
     
        $escapeHtml = $this->getView()->plugin('escapeHtml');
        
        if (isset($item['subitem'])) {
            $result .= $isActive?'<li class="active">':'<li>';
            $result .='<h3>' . $escapeHtml($label) . '</h3>';
            $result .='<div><div><ul id="bloc2">';
            
            $subItems = $item['subitem'];
            foreach ($subItems as $item){
                $label = isset($item['label']) ? $item['label'] : '';
                
                if (isset($item['link'])) {
                    $link = isset($item['link']) ? $item['link'] : '#';
                    
                    $result .= $isActive?'<li class="active">':'<li>';
                    $result .= '<a href="'.$escapeHtml($link).'">'.$escapeHtml($label).'</a>';
                    $result .= '</li>';
                }elseif (isset($item['submenu'])) {
                    $result .= '<li>';
                    $result .='<h4>' .$escapeHtml($label). '</h4>';
                    $result .='<ul id="bloc3">';
                    
                    $subMenus = $item['submenu'];
                    foreach ($subMenus as $subMenu){
                        $label = isset($subMenu['label']) ? $subMenu['label'] : '';
                        $link = isset($subMenu['link']) ? $subMenu['link'] : '#';
                            
                        $result .= '<li>';
                        $result .= '<a href="'.$escapeHtml($link).'">'.$escapeHtml($label).'</a>';
                        $result .= '</li>';
                    }
                    $result .='</ul></li>';
                    $result .='<figure>';
                    $result .='<img>';
                    $result .='<figcaption>';
                    $result .='<h4></h4>';
                    $result .='<p></p>';
                    $result .='<figcaption>';
                    $result .='</figure>';
                }
            }
            
            $result .='</ul></div></div>';
            
        } else {        
            $link = isset($item['link']) ? $item['link'] : '#';
            
            $result .= $isActive?'<li class="active">':'<li>';
            $result .= '<a href="'.$escapeHtml($link).'"><img src="img/'.$escapeHtml($label).'.svg"></a>';
            $result .= '</li>';
        }
    
        return $result;
    }
}
