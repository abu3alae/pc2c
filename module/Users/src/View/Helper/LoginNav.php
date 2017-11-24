<?php
namespace Users\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * This view helper class displays a menu bar.
 */
class LoginNav extends AbstractHelper 
{
    /**
     * Menu items array.
     * @var array 
     */
    protected $items = [];
    
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
     * Renders the menu.
     * @return string HTML code of the menu.
     */
    public function render() 
    {
        if (count($this->items)==0)
            return ''; // Do nothing if there are no items.
       
        // Render items
        foreach ($this->items as $item) {
            $result = $this->renderItem($item);
        }
        
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
        $label = isset($item['label']) ? $item['label'] : '';
             
        $result = ''; 
     
        $escapeHtml = $this->getView()->plugin('escapeHtml');
        
        if (isset($item['dropdown'])) {
            
            $dropdownItems = $item['dropdown'];
            
            $result .= '<li class="dropdown">';
            $result .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
            $result .= $escapeHtml($label) . ' <b class="caret"></b>';
            $result .= '</a>';
           
            $result .= '<ul class="dropdown-menu">';
            foreach ($dropdownItems as $item) {
                $link = isset($item['link']) ? $item['link'] : '#';
                $label = isset($item['label']) ? $item['label'] : '';
                
                $result .= '<li>';
                $result .= '<a href="'.$escapeHtml($link).'">'.$escapeHtml($label).'</a>';
                $result .= '</li>';
            }
            $result .= '</ul>';
            $result .= '</li>';
            
        } else {        
            $link = isset($item['link']) ? $item['link'] : '#';
            
            $result .= '<button type="button" class="btn btn-info" data-toggle="collapse"';
            $result .= 'data-target="#demo">'.$escapeHtml($label).'</button>';
            $result .= '<div id="demo" class="collapse login">';
            $result .= '<form class="form-signin">';
            $result .= '<label for="inputEmail" class="sr-only">Email address</label>';
            $result .= '<input dir="ltr" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>';
            $result .= '<label for="inputPassword" class="sr-only">Password</label>';
            $result .= '<input dir="ltr" type="password" id="inputPassword" class="form-control" placeholder="Password" required>';
            $result .= '<div class="checkbox">';
            $result .= '<label for="remember-me"> اتصال لفترة أطول</label>';
            $result .= '<input type="checkbox" id="remember-me" value="remember-me">';
            $result .= '</div>';
            $result .= '<button class="btn btn-lg btn-primary btn-block" type="submit">دخول</button>';
            $result .= '</form>';
            $result .= '<a href="'.$escapeHtml($link).'">حساب جديد</a>';
            $result .= '</div>';
        }
    
        return $result;
    }
}
