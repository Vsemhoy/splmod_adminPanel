<?php
namespace App\Http\Controllers\AdminTemplate;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

use App\Http\Components\com_users\UsersController;

use App\Http\Controllers\BaseHelpers\TextHelpers;

class Table extends BaseController
{
    private $result;
    public $table;
    public $tableHeader;
    public $tableData;

    public $width;
    public $height;

    private $_dataRows;
    private $_tableHeader;
    private $_row;
    private $_tdata;
    private $_headRowData;
    private $_defClass;

    function __construct($setDefaultClasses = false)
    {
        $result = "";
        $this->table = "";
        $this->tableHeader = "";
        $this->tableData = "";
        $this->width = 0;
        $this->height = 0;
        $this->_dataRows = "";
        $this->_headRowData = "";

        $this->_defClass = $setDefaultClasses;
    }

    public function CloseTable($class = "", $id = "", $attributes = "")
    {
        if ($this->_defClass){
            $class = "uk-table uk-table-hover uk-table-middle uk-table-divider " . $class;
        }
        $this->result = "<table class='{$class}' id='{$id}' " . $attributes . ">";
        if ($this->tableHeader != ""){
            $this->result .= "<thead>" . $this->tableHeader . "</thead>";
        };
        $this->result .= "<tbody>" . $this->tableData . "</tbody></table>";
        $this->table = $this->result;
        return $this;
    }

    public function SetRow($class = "", $id = "", $attributes = "")
    {
        $this->_row = "<tr class='{$class}' id='{$id}' " . $attributes . ">";
        return $this;
    }
    
    public function AddCell($value = "", $class = "", $id = "", $attributes = "")
    {
        if ($id != ""){ $id = "id='" . $id . "' "; };
        $this->_row .= "<td class='{$class}' {$id}{$attributes}>";
        $this->_row .= $value . "</td>";
        return $this;
    }
    
    public function CloseRow()
    {
        $this->_row .= "</tr>";
        $this->tableData .= $this->_row;
        $this->height++;
        return $this;
    }


    public function SetHeadRow($class = "", $id = "", $attributes = "")
    {
        $this->_headRowData = "";
        $this->_headRowData = "<tr class='{$class}' id='{$id}' " . $attributes . ">";
        return $this;
    }

    public function AddHeadCell($value = "", $class = "", $id = "", $attributes = "")
    {
        if ($id != ""){ $id = "id='" . $id . "' "; };
        $this->_headRowData .= "<th class='{$class}' {$id}{$attributes}>";
        $this->_headRowData .= $value . "</th>";
        $this->width++;
        return $this;
    }

    public function CloseHeadRow()
    {
        $this->_headRowData .= "</tr>";
        $this->tableHeader .= $this->_headRowData;
        return $this;
    }

    public function AddTotalSign($total = null)
    {
        $of = "";
        if ($total != null){
            $of = " из " . $total;
        };
        $word = Texthelpers::GetLastLetterByCountRuEy($this->height);
        $this->table .= "<p class='tabletotal'>Выведено: " . $this->height . " запис" . $word . $of . "</p>";
        return $this;
    }


    public static function RenderStatusDot($status)
    {
        $class="";
        if (UsersController::$userStates[$status] != null)
        {
            $class = UsersController::$userStateClasses[$status];
        }
        $result = "<span class='StatusDot " . $class . "' data-status='" . UsersController::$userStates[$status]  . "'></span>";
        return $result;
    }

};
