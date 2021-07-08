<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests\HelloRequest;



class HelloController extends Controller
{
    public function index(Request $request){
       $items = DB::select("select * from preople");
       return view('hello.index',['items'=>$items]);
    }

}
