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
                ->prepend('<span class="oi oi-external-link"></span>')
                ->attribute(['class' => 'nav-item d-none d-xl-block'])
                ->link->attr([
                    "target" => "_blank",
                    "data-toggle" => "tooltip",
                    "data-placement" => "bottom",
                    "title"=>"Preview Website",
                    "class" => "nav-link"
                ]);

        $menu->add('Notification', '', '/')
                ->prepend('<span class="oi oi-bell"></span>')
                ->attribute(['class' => 'nav-item d-none d-xl-block'])
                ->link->attr([
                    "class" => "nav-link"
                ]);

        app('events')->fire('backend.sidebar.menu.getTopMenu.before', [
            'menu'  => $menu
        ]);        

        $menu->add('Logout', '', route('backend.logout'))
                ->attribute(['class' => 'nav-item'])
                ->prepend('<span class="oi oi-account-logout"></span>')
                ->append('<form id="logout-form" action="'.route('backend.logout').
                    '" method="POST" style="display: none;">'.csrf_field().'</form>')
                ->link->attr([
                    'onclick' => "event.preventDefault();document.getElementById('logout-form').submit();",
                    "data-toggle" => "tooltip",
                    "data-placement" => "bottom",
                    "title"=>"Log Out",
                    "class" => "nav-link"
                ]);        

        $html = $menu->asUl(['class' => 'navbar-nav ml-auto']);

        app('events')->fire('backend.sidebar.menu.getTopMenu.after', [
            'menu' => $menu,
            'html' => $html,
        ]);

        return $html;
    }
}
