<?php

namespace App\Http\Controllers;

use App\Models\Preople;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request){
        $items = Preople::all();
        return view("Person.index",["items" => $items]);
    }

    public function find(Request $request){
        return view("person.find",["input" => ""]);
    }

    public function search(Request $request){
        $item = Preople::find($request->input);
        $param = ["input" => $request->input,"item" => $item];
        return view("person.find",$param);
    }
}
