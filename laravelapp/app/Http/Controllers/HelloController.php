<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests\HelloRequest;



class HelloController extends Controller
{
    public function index(Request $request){
        if(isset($request->id)){
            $param = ["id" => $request->id];
            $items = DB::select("select * from preople where id = :id",$param);
        } else {
            $items = DB::select("select * from preople");
        }
       return view('hello.index',['items'=>$items]);
    }

}
