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


class UsersMenuController extends BaseController
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
        $obj->name = "Пользователи";
        $obj->ref = route('admin.users');
        $obj->class = Navigation::SetActiveClass('admin.users');
        $obj->childs = [];
        array_push($menu, $obj);

        $obj = new stdClass();
        $obj->name = "Список пользователей";
        $obj->ref = route('admin.users.userlist');
        $obj->class =  Navigation::SetActiveClass('admin.users.userlist');
        $obj->childs = [];
        array_push($menu, $obj);

        $obj = new stdClass();
        $obj->name = "Статистика расчетов";
        $obj->ref = route('admin.users.userlist');
        $obj->class = "";
        $obj->class =  Navigation::SetActiveClass('admin.users.userlist');
        $obj->childs = [];
        array_push($menu, $obj);

        $obj = new stdClass();
        $obj->name = "Пользовательские запросы";
        $obj->ref = route('admin.users.userlist');
        $obj->class = "";
        $obj->class =  Navigation::SetActiveClass('admin.users.userlist');
        $obj->childs = 
        [
            (object) array(
            "name" => "Обратная связь",
            "ref" => route('admin.users.userlist'),
            "class" => Navigation::SetActiveClass('admin.users.userlist'),
            "childs" => []
            ),
            (object) array(
            "name" => "Скачивание",
            "ref" => route('admin.users.userlist'),
            "class" => Navigation::SetActiveClass('admin.users.userlist'),
            "childs" => []
            ),
            (object) array(
            "name" => "Обновление",
            "ref" => route('admin.users.userlist'),
            "class" => Navigation::SetActiveClass('admin.users.userlist'),
            "childs" => []
            ),
        ];
        array_push($menu, $obj);

        return Navigation::MarkupMenu($menu);
    }

    
    public static function BuildBreadCrumbs(Request $request)
    {

        $brcArr = [];
            $obj = new stdClass();
            $obj->ref = route('admin.users');
            $obj->name = "Пользователи";
            array_push($brcArr, $obj);

        if (Route::is('admin.users.userlist')){
            $obj = new stdClass();
            $obj->ref = route('admin.users.userlist');
            $obj->name = "Список Пользователей";
            array_push($brcArr, $obj);
        }

        return Navigation::MarkupBreadcrumbs($brcArr);
    }

}