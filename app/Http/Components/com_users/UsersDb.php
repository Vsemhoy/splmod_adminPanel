<?php

namespace App\Http\Components\com_users;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersDb extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function GetUserList($offset, $limit, $state = '', $text = null)
    {
        if ($text == null){
            if ($state == null){
    
                $users = DB::table(env('TABLE_CLIENTS'))->orderBy('id', 'DESC')->offset($offset)->limit($limit)->get();
                return $users;
            }
            else 
            {
                $users = DB::table(env('TABLE_CLIENTS'))->where('is_active', $state)->orderBy('id', 'DESC')->offset($offset)->limit($limit)->get();
                return $users;
            }

        } else {
            if ($state == ''){
                echo "case 3 , state " . $state;
                $users = DB::table(env('TABLE_CLIENTS'))
                ->where('name', 'LIKE', '%' . $text . '%')
                ->orwhere('name', 'LIKE', '%' . $text . '%')
                ->orwhere('email', 'LIKE', '%' . $text . '%')
                ->orwhere('login', 'LIKE', '%' . $text . '%')
                ->orwhere('company', 'LIKE', '%' . $text . '%')
                ->orwhere('info', 'LIKE', '%' . $text . '%')
                ->orderBy('id', 'DESC')->offset($offset)->limit($limit)->get();
                return $users;
            }
            else 
            {
                echo "case 4 , state " . $state;
                $users = DB::table(env('TABLE_CLIENTS'))
                ->where(function ($query) use ($text)
                {
                    $query->where('name', 'LIKE', '%' . $text . '%')
                    ->orwhere('name', 'LIKE', '%' . $text . '%')
                    ->orwhere('email', 'LIKE', '%' . $text . '%')
                    ->orwhere('login', 'LIKE', '%' . $text . '%')
                    ->orwhere('company', 'LIKE', '%' . $text . '%')
                    ->orwhere('info', 'LIKE', '%' . $text . '%');
                }
                )->where('is_active', '=', $state)
                ->orderBy('id', 'DESC')->offset($offset)->limit($limit)->get();
                return $users;
            }
        }
    }

    public static function GetLastMonthUserList($offset = 3)
    {
        $date = date("Y-m-d", strtotime("-" . $offset . " Months"));

        $users = DB::table(env('TABLE_CLIENTS'))->where('created_at', '>=', $date)->orderBy('id', 'DESC')->get();
        return $users;
    }



    public static function GetUserListCount($state = null, $text = null)
    {
        $count = "";
        if ($text == null){
            if ($state == null)
            {
                $count = DB::table(env('TABLE_CLIENTS'))->count();
            } 
            else 
            {
                $count = DB::table(env('TABLE_CLIENTS'))->where('is_active', $state)->count();
            }
        } else {
            if ($state == null){

                $users = DB::table(env('TABLE_CLIENTS'))
                ->where('name', 'LIKE', '%' . $text . '%')
                ->orwhere('name', 'LIKE', '%' . $text . '%')
                ->orwhere('email', 'LIKE', '%' . $text . '%')
                ->orwhere('login', 'LIKE', '%' . $text . '%')
                ->orwhere('company', 'LIKE', '%' . $text . '%')
                ->orwhere('info', 'LIKE', '%' . $text . '%')
                ->count();
                return $users;
            }
            else 
            {
                $users = DB::table(env('TABLE_CLIENTS'))->where('is_active', $state)
                ->where('name', 'LIKE', '%' . $text . '%')
                ->orwhere('name', 'LIKE', '%' . $text . '%')
                ->orwhere('email', 'LIKE', '%' . $text . '%')
                ->orwhere('login', 'LIKE', '%' . $text . '%')
                ->orwhere('company', 'LIKE', '%' . $text . '%')
                ->orwhere('info', 'LIKE', '%' . $text . '%')
                ->where('is_active', $state)->count();
                return $users;
            }
        }
        return $count;
    }


}
