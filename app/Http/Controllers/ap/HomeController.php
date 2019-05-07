<?php

namespace App\Http\Controllers\ap;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = DB::table('artikel')
                    // ->select('user.id')
                    ->join('user', 'artikel.user_id','=','user.id')
                    ->get();
        // var_dump($artikel);
        return view('admin/home/index',['artikel'=>$artikel]);
    }
}
