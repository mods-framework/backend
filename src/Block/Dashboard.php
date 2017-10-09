<?php

namespace Mods\Backend\Block;

use Menu;
use Mods\View\Block as BaseBlock;

class Dashboard extends BaseBlock
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
                ->prepend('<i class="material-icons">dashboard</i> ');

        app('events')->fire('backend.sidebar.menu.getSideMenu.before', [
            'menu'  => $menu
        ]);

        $html = $this->renderSideMenu($menu);

        app('events')->fire('admin.sidebar.menu.getSideMenu.after', [
            'menu' => $menu,
            'html' => $html,
        ]);

        return $html;
    }

    /**
     * Top menu.
     *
     * @return array
     */
    public function getTopMenu()
    {
        $menu = \Menu::make();

        $menu->add('Preview', '', '/')
                ->prepend('<i class="material-icons">open_in_new</i> ')
                ->attribute(['class' => 'hide-on-med-and-down'])
                ->link->attr([
                    "data-position" => "bottom",
                    "data-delay"=>"50", 
                    "data-tooltip"=>"Preview Website", 
                    "class"=>"tooltipped waves-effect waves-block waves-light"
                ]);

        $menu->add('Logout', '', route('backend.logout'))
                ->prepend('<i class="material-icons">settings_power</i> ')
                ->append('<form id="logout-form" action="'.route('backend.logout').
                    '" method="POST" style="display: none;">'.csrf_field().'</form>')
                ->link->attr([
                    'onclick' => "event.preventDefault();document.getElementById('logout-form').submit();",
                    "data-position" => "bottom",
                    "data-delay"=>"50", 
                    "data-tooltip"=>"Log Out", 
                    "class"=>"tooltipped waves-effect waves-block waves-light"
                ]);        

        app('events')->fire('backend.sidebar.menu.getTopMenu.before', [
            'menu'  => $menu
        ]);

        $html = $menu->asUl(['class' => 'right']);

        app('events')->fire('admin.sidebar.menu.getTopMenu.after', [
            'menu' => $menu,
            'html' => $html,
        ]);

        return $html;
    }


    protected function renderSideMenu($menu)
    {
        return "<ul{$menu->attributes(['id'=>'open-left-menu', 'class'=>'side-nav fixed leftside'])}>{$this->render($menu ,'ul')}</ul>";
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
            $items .= "<{$itemTag}{$item->attributes()}>";
            $link =  $arrow = '';
            if ($item->link) {
                $item->link->attr(['class' => 'collapsible-header waves-effect waves-cyan']);
                $attribute = $menu->attributes($item->link->attr());
                $link = "href=\"{$item->url()}\"";
            } else {
                $attribute = 'collapsible-header waves-effect waves-cyan';
            }


            if ($item->hasChildren()) { 
                $items .= '<ul class="collapsible"><li>';
                $link = '';
                $arrow = '<div class="arrow-group right"> 
                    <i class="material-icons keyboard_arrow_right">keyboard_arrow_right</i> 
                    <i class="material-icons keyboard_arrow_down">keyboard_arrow_down</i> 
                </div>';
            }

            $items .= "<a{$attribute} {$link}>{$item->title} {$arrow} </a>";

            if ($item->hasChildren()) {
                $items .= "<div class='collapsible-body'> <{$type}>";
                $items .= $this->render($menu, $type, $item->id);
                $items .= "</{$type}></div>";
                $items .= '</li
                ></ul>';
            }
            $items .= "</{$itemTag}>";
            if ($item->divider) {
                $items .= "<{$itemTag}{$menu->attributes($item->divider)}></{$itemTag}>";
            }
        }
        return $items;
    }
}
