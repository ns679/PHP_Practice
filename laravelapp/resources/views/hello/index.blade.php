@extends('layouts.helloapp')

@section('title','Index')

@section("menubar")
    @parent
    インデックスページ
@endsection

@section("content")
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述可能</p>

    @include('components.message',['msg_title'=>'OK',
            'msg_content'=>'サブビューです'])
@endsection

@section("footer")
    copyright 2020 aaaaa.
@endsection
