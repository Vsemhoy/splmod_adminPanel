<?php

namespace App\Http\Components\com_users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use App\Http\Components\com_users\UsersMenuController as MenuController;
use App\Http\Components\com_users\UsersDb as CDB;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Input;


use App\Http\Controllers\AdminTemplate\Table;
use App\Http\Controllers\AdminTemplate\Navigation;
use App\Http\Controllers\BaseHelpers\TextHelpers;


class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $request;
    public $totalCount;

    public static $userStates = ["-1" => "Забанен", "0" => "Отключен", "1" => "Активен", "2" => "Требует активации" ];
    public static $userStateClasses = ["-1" => "user-banned", "0" => "user-disabled", "1" => "user-enabled", "2" => "user-toactivate" ];
    public static $countValues = [10, 25, 50, 100];

    public $stateToShow;
    public $countToShow;
    public $textToShow;
    public $totalPages;
    public $pageNumber;

    public $dbOffset;

    
    function __construct()
    {
        $this->request = new Request();
        $this->countToShow = Input::get('count', 'INT', 10);
        $this->pageNumber = Input::get('page', 'INT', 1) - 1;
        $this->stateToShow = Input::get('state', 'INT', null);
        $this->textToShow = Input::get('text', 'STRING', null);
        $this->totalCount = CDB::GetUserListCount($this->stateToShow, $this->textToShow);


        $this->totalPages = ceil((int)$this->totalCount / (int)$this->countToShow);

        $this->dbOffset = 0;
        if ($this->pageNumber > 0){
            $this->dbOffset = (int)$this->pageNumber * (int)$this->countToShow;
        } else {

        }

        $this->pageNumber += 1;
    }


    public function RenderMenu()
    {
        echo MenuController::BuildMenu($this->request);
    }

    public function RenderBreadcrumbs()
    {
        echo MenuController::BuildBreadcrumbs($this->request);
    }


    public function RenderuserList()
    {
        $users = CDB::GetUserList(
            $this->dbOffset,
             $this->countToShow,
             $this->stateToShow,
             $this->textToShow);
        $total = $this->totalCount;
        $result  = "";

        $tb = new Table(true);
        $tb->SetHeadRow();
        $tb->AddHeadCell("Id");
        $tb->AddHeadCell("Имя");
        $tb->AddHeadCell("Логин");
        $tb->AddHeadCell("Email");
        $tb->AddHeadCell("Создан");
        $tb->AddHeadCell("Акт");
        $tb->AddHeadCell("Раздел");
        $tb->AddHeadCell("");
        $tb->CloseHeadRow();

        foreach ($users AS $data)
        {
            // build menu
            $arr = [];
            if ($data->is_active == 0){
                $menuItem = Navigation::WrapPopmenuItem("Активировать", "user-activate", "", "", "data-id='" . $data->id . "'");
                array_push($arr, $menuItem);
            }
            $menuItem = Navigation::WrapPopmenuItem("Редактировать", "user-edit", "", route('admin.users.usereditor') . "?user=" . $data->id , "");
            array_push($arr, $menuItem);
            $menuItem = Navigation::WrapPopmenuItem("Статистика", "user-stat", "", route('admin.users.usereditor') . "?user=" . $data->id , "");
            array_push($arr, $menuItem);
            $menu = Navigation::WrapPopmenu($arr, 'more-vertical');

            $rowId = "row_" . $data->id;
            $tb->SetRow("", $rowId);
            $tb->AddCell($data->id);
            $tb->AddCell($data->name);
            $tb->AddCell($data->login);
            $tb->AddCell($data->email);
            $tb->AddCell(TextHelpers::TimeToYearMonth($data->created_at));
            $tb->AddCell(Table::RenderStatusDot($data->is_active));
            $tb->AddCell($data->service);
            $tb->AddCell($menu);
            
            $tb->CloseRow();
        }
        $tb->CloseTable("uk-table-small");
        $tb->AddTotalSign($total);
        echo $tb->table;
    }


    public function RenderuserList_lastMonth()
    {
        $offset = Input::get('offset', 'INT', 3);

        $users = CDB::GetLastMonthUserList($offset);
        $total = 0;
        $result  = "";

        $tb = new Table(true);
        $tb->SetHeadRow();
        $tb->AddHeadCell("Id");
        $tb->AddHeadCell("Имя");
        $tb->AddHeadCell("Логин");
        $tb->AddHeadCell("Email");
        $tb->AddHeadCell("Создан");
        $tb->AddHeadCell("Акт");
        $tb->AddHeadCell("Раздел");
        $tb->AddHeadCell("");
        $tb->CloseHeadRow();

        foreach ($users AS $data)
        {
            // build menu
            $arr = [];
            if ($data->is_active == 0){
                $menuItem = Navigation::WrapPopmenuItem("Активировать", "user-activate", "", "", "data-id='" . $data->id . "'");
                array_push($arr, $menuItem);
            }
            $menuItem = Navigation::WrapPopmenuItem("Редактировать", "user-edit", "", route('admin.users.usereditor') . "?user=" . $data->id , "");
            array_push($arr, $menuItem);
            $menuItem = Navigation::WrapPopmenuItem("Статистика", "user-stat", "", route('admin.users.usereditor') . "?user=" . $data->id , "");
            array_push($arr, $menuItem);
            $menu = Navigation::WrapPopmenu($arr, 'more-vertical');

            $rowId = "row_" . $data->id;
            $tb->SetRow("", $rowId);
            $tb->AddCell($data->id);
            $tb->AddCell($data->name);
            $tb->AddCell($data->login);
            $tb->AddCell($data->email);
            $tb->AddCell(TextHelpers::TimeToYearMonth($data->created_at));
            $tb->AddCell(Table::RenderStatusDot($data->is_active));
            $tb->AddCell($data->service);
            $tb->AddCell($menu);
            
            $tb->CloseRow();
            $total++;
        }
        $tb->CloseTable("uk-table-small");
        $tb->AddTotalSign($total);
        echo $tb->table;
    }
}
