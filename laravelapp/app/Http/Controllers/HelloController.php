<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(){
        $data = [
            ["name"=>"aaaaaa","mail" => "aaaa@kkkk"],
            ["name"=>"bbbbbb","mail" => "bbbb@zzzz"],
            ["name"=>"cccccc","mail" => "cccc@xxxx"]
        ];
       return view('hello.index',['data'=>$data]);
    }

}
