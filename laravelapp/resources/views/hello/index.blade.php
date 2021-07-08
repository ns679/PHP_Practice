@extends('layouts.helloapp')

@section('title','Index')

@section("menubar")
    @parent
    インデックスページ
@endsection

@section("content")
        <table>
            <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
            @foreach($items as $item)
                <tr>
                    <th>{{$item->name}}</th>
                    <th>{{$item->mail}}</th>
                    <th>{{$item->age}}</th>
                </tr>
            @endforeach
        </table>
@endsection

@section("footer")
    copyright 2020 aaaaa.
@endsection
