<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == "1")
        {
        return view('admin.dashb'); // Trang admin
        }
        else 
        {
            $data = DB::select("select * from dienthoai order by gia_goc");
            return view("pages.home", compact("data"));
           
        }

    }

}
