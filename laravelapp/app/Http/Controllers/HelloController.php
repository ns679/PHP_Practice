<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request -> query(),[
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()) {
            $msg = "クエリ―に問題があります";
        }else{
            $msg = "ID/PASSを受け付けました。フォームを入力してください";
        }
       return view('hello.index',['msg'=> $msg, ]);
    }

    public function post(Request $request){

        $rules = [
            "name" => "required",
            "mail" => "email",
            "age" => "numeric|between:0,150",
        ];
        $message = [
            "name.required"=>"名前は必ず入力してください",
            "mail.email"=>"メールアドレスが必要です。",
            "age.numeric"=>"年齢を整数で入力してください",
            "age.between"=>"年齢は０～150の間で記入してください",
        ];
        $validator = Validator::make($request->all(),$rules,$message);
        if($validator-> fails()){
            return redirect("/hello")
                            ->withErrors($validator)
                            ->withInput();
        }
        return view("hello.index",["msg" => "正しく入力されました！"]);
    }
}
