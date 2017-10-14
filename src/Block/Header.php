<?php

namespace Mods\Backend\Block;

use Menu;
use Mods\View\Block as BaseBlock;

class Header extends BaseBlock
{
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
                    "target" => "_blank",
                    "data-position" => "bottom",
                    "data-delay"=>"50", 
                    "data-tooltip"=>"Preview Website", 
                    "class"=>"tooltipped waves-effect waves-block waves-light"
                ]);

        $menu->add('Notification', '', '/')
                ->prepend('<i class="material-icons">notifications</i> ')
                ->attribute(['class' => 'hide-on-med-and-down'])
                ->link->attr([
                    "class"=>"waves-effect waves-block waves-light"
                ]);

        app('events')->fire('backend.sidebar.menu.getTopMenu.before', [
            'menu'  => $menu
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

        $html = $menu->asUl(['class' => 'right']);

        app('events')->fire('admin.sidebar.menu.getTopMenu.after', [
            'menu' => $menu,
            'html' => $html,
        ]);

        return $html;
    }
}
