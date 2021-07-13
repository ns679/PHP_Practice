<?php

namespace App\Http\Controllers;

use App\Models\Preople;
use Faker\Provider\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request){
        $hasItems = Preople::has("board")->get();
        $noItems = Preople::doesntHave("board")->get();
        $param = ["hasItems" => $hasItems,"noItems" => $noItems];
        return view("Person.index",$param);
    }

    public function find(Request $request){
        return view("person.find",["input" => ""]);
    }

    public function search(Request $request){
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Preople::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ["input" => $request->input,"item" => $item];
        return view("person.find",$param);
    }

    public function add(Request $request){
        return view("person.add");
    }

    public function create(Request $request){
        $this -> validate($request,Preople::$rules);
        $preople = new Preople;
        $form = $request->all();
        unset($form["_token"]);
        $preople->fill($form)->save();
        return redirect("/person");
    }

    public function edit(Request $request){
        $preople = Preople::find($request -> id);
        return view("person.edit",["form" => $preople]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Preople::$rules);
        $preople = Preople::find($request->id);
        $form = $request->all();
        unset($form["_token"]);
        $preople->fill($form)->save();
        return redirect("/person");
    }
    public function delete(Request $request){
        $preople = Preople::find($request -> id);
        return view("person.del",["form" => $preople]);
    }
    public function remove(Request $request){
        Preople::find($request -> id) -> delete();
        return redirect("/person");
    }
}
