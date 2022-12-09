<?php

namespace App\Http\Controllers\AdminTemplate;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class Navigation extends BaseController
{
    
    // wrap array of objects into breadcrumb list
    public static function MarkupBreadcrumbs($array)
    {
        $result  = "";
        $result .= "<ul class='uk-breadcrumb'>";
        $i = 1;
        foreach ($array AS $obj)
        {
            if (count($array) == $i)
            {
                $result .= "            <li><a class='uk-active uk-text-bold'>" . $obj->name . "</a></li>";
            }
            else 
            {
                $result .= "            <li><a href='" . $obj->ref . "'>" . $obj->name . "</a></li>";

            }
            $i++;
        }
        $result .= "<li><span></span></li>
        </ul>";
        return $result;
    }


    public static function SetActiveClass($route){
        if (Route::is($route)){ return " uk-active"; };
        return "";
    }

    public static function MarkupMenu($array)
    {
        $menu = '';
        $menu .= "<div class='sidebar-section'>

        <div class='control-group'>
            <div class='control btn-default'>
                <input type='text'  placeholder='Поиск по компоненту' />
                <button class='button'><span uk-icon='search'></span></button>
            </div>
        </div>
    
        <div class='sidebar-section'>
            <ul class='uk-nav-default' uk-nav>";
                foreach($array AS $item)
                {
                    $menu .= Self::WrapMenuItem($item);
                }

                $menu .= "</ul>
        </div>
    </div>";
    return $menu;
    }

    public static function WrapMenuItem($object)
    {
        if (is_object($object))
        {
            $result = "<li class='" . $object->class;
            if (count($object->childs) > 0){ $result .= " uk-parent";};
            $result .= "'>";
            $result .= "<a href='" . $object->ref . "'>" . $object->name . "</a>";
            if (count($object->childs) > 0){ 
                $result .= "<ul class='uk-nav-sub'>";
                foreach ($object->childs AS $child)
                {
                    $result .= Self::WrapMenuItem($child);
                }
                $result .= "</ul>";
            };
            
            $result .= "<li>";
            return $result;
        }
    }


    public static function WrapPopmenuItem($name, $class, $id, $ref, $attr)
    {
        if ($id != ""){
            $id = " id='" . $id . "' ";
        }
        if ($class != ""){
            $class = " class='" . $class . "'";
        }
        if ($ref == ""){
            $ref = "#";
        }
        $result = "<li " . $id . $class . "><a href='". $ref . "'>" . $name . "</a></li>";
        return $result;
    }

    public static function WrapPopmenu($items, $icon)
    {
        $result = "<div class='uk-navbar-right' uk-navbar>
        <a href='#'uk-icon='more-vertical'></a>
        <div class='uk-navbar-dropdown'>
        <ul class='uk-nav uk-navbar-dropdown-nav'>";
        foreach ($items AS $item){
            $result .= $item;
        }
        $result .= "</ul></div></div>";
        return $result;
    }

}

