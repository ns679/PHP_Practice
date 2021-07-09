<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests\HelloRequest;



class HelloController extends Controller
{
    public function index(Request $request){
        $items = DB::table("preople")->orderBy("age","asc")->get();
        return view('hello.index',['items'=>$items]);
    }

    public function post(Request $request){
        $items = DB::select("select * from preople");
        return view('hello.index',['items'=>$items]);
    }

    public function add(Request $request){
        return view("hello.add");
    }

    public function create(Request $request){
        $param = [
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request -> age,
        ];
        DB::insert("insert into preople (name,mail,age) values(:name,:mail,:age)",$param);
        return redirect("/hello");
    }

    public function edit(Request $request){
        $param = ["id" => $request -> id];
        $item = DB::select("select * from preople where id = :id",$param);
        return view("hello.edit",["form" => $item[0]]);
    }

    public function update(Request $request){
        $param = [
            "id" => $request->id,
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request->age,
        ];
        DB::update("update preople set name = :name,mail = :mail,age = :age where id = :id",$param);
        return redirect("/hello");
    }

    public function del(Request $request){
        $param = ["id" => $request->id];
        $item = DB::select("select * from preople where id = :id",$param);
        return view("hello.del",["form" => $item[0]]);
    }
    public function remove(Request $request){
        $param = ["id" => $request->id];
        DB::delete("delete from preople where id = :id",$param);
        return redirect("/hello");
    }

    public function show(Request $request){
        $min = $request->min;
        $max = $request->max;
        $items = DB::table("preople")->whereraw("age >= ? and age <= ?",[$min,$max])-> get();
        return view("hello.show",["items" => $items]);
    }
}
