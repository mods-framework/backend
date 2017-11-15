<?php

namespace Mods\Backend\Block;

use Menu;
use Mods\View\Block as BaseBlock;

class SidebarLeft extends BaseBlock
{
	/**
     * Left sider-bar menu.
     *
     * @return array
     */
    public function getSideMenu()
    {

        $menu = \Menu::make();

        $menu->add('Dashboard', 'Dashboard', ['route'  => 'backend.dashboard'])
                ->prepend('<span class="oi oi-dashboard"></span>');

        app('events')->fire('backend.sidebar.menu.getSideMenu.before', [
            'menu'  => $menu
        ]);

        $html = $this->renderSideMenu($menu);

        app('events')->fire('backend.sidebar.menu.getSideMenu.after', [
            'menu' => $menu,
            'html' => $html,
        ]);

        return $html;
    }


    protected function renderSideMenu($menu)
    {
        return "<ul{$menu->attributes(['class'=>'side-nav leftside'])}>{$this->render($menu ,'ul')}</ul>";
    }

    /**
     * Generate the menu items as list items, recursively.
     *
     * @param  string  $type
     * @param  int     $parent
     * @return string
     */
    protected function render($menu, $type = 'ul', $parent = null)
    {
        $items   = '';
        $itemTag = in_array($type, ['ul', 'ol']) ? 'li' : $type;
        foreach ($menu->where('parent', $parent) as $item) {

            if ($item->hasChildren()) {
                $item->attribute(['class'=>'has-sub']);               
            }


            $items .= "<{$itemTag}{$item->attributes()}>";

            if (!$item->hasChildren()) {
                $items .= "<a{$menu->attributes($item->link->attr())} href=\"{$item->url()}\">{$item->title}</a>";
            } else {
                $classAttr = '';
                if($item->data('active') === true){
                    $classAttr = "class=\"active\"";
                }
                $items .= "<span {$classAttr}>{$item->title}</span>";
            }
            if ($item->hasChildren()) {
                $items .= "<{$type}>";
                $items .= $this->render($menu, $type, $item->id);
                $items .= "</{$type}>";
            }
            $items .= "</{$itemTag}>";
            if ($item->divider) {
                $items .= "<{$itemTag}{$menu->attributes($item->divider)}></{$itemTag}>";
            }
        }
        return $items;
    }
}
