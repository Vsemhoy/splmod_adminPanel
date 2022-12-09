<?php

namespace App\Http\Components\com_users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use stdClass;

use App\Http\Controllers\AdminTemplate\Navigation;


class ApplicationsMenuController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public static function BuildMenu(Request $request)
    {
        $menu = [];
        
        // $obj = new new stdClass();
        // $ojb->name = "";
        // $ojb->url = "";
        // $obj->class = "";
        // $obj->childs = [];
        // array_push($menu, $obj);

        $obj = new stdClass();
        $obj->name = "SPLмодуль";
        $obj->ref = route('admin.apps.splmodule');
        $obj->class = Navigation::SetActiveClass('admin.users') . " color-splmod uk-light";
        $obj->childs = [];
        array_push($menu, $obj);

        $obj = new stdClass();
        $obj->name = "Добавить приложение";
        $obj->ref = route('admin.users.userlist');
        $obj->class =  Navigation::SetActiveClass('admin.users.userlist');
        $obj->childs = [];
        array_push($menu, $obj);

        

        return Navigation::MarkupMenu($menu);
    }

    
    public static function BuildBreadCrumbs(Request $request)
    {

        $brcArr = [];
            $obj = new stdClass();
            $obj->ref = route('admin.apps');
            $obj->name = "Приложения";
            array_push($brcArr, $obj);

        if (Route::is('admin.apps.splmodule')){
            $obj = new stdClass();
            $obj->ref = route('admin.users.splmodule');
            $obj->name = "SPLмодуль";
            array_push($brcArr, $obj);
        }

        return Navigation::MarkupBreadcrumbs($brcArr);
    }

}