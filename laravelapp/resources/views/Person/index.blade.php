@extends("layouts.helloapp")

@section("title","Preople.index")

@section("menubar")
    @parent
    インデックスページ
@endsection

@section("content")
    <table>
        <tr><th>Person</th><th>Board</th></tr>
        @foreach($items as $item)
            <tr>
                 <td>{{$item->getData()}}</td>
                <td>@if ($item->board != null)
                          <table width="100%">
                              @foreach($item->board as $obj)
                                  <tr><td>{{$obj->getData()}}</td></tr>
                              @endforeach
                          </table>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section("footer")
    copyright 2021 aaaaaa
@endsection
