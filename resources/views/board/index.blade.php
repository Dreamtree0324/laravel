@extends('layout/master')

@section('content')
    <img src="/image/Desert.jpg" alt="">
    <h2>게시글 리스트</h2>
    <table class="table table-striped">
        <tr>
            <th>글번호</th>
            <th width="60%">글제목</th>
            <th>글쓴이</th>
        </tr>
        @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>
                    <a href="/board/view/{{$item->id}}">
                        {{$item->title}}
                    </a>
                </td>
                <td>{{$item->user()->first()->name}}</td>
            </tr>
        @endforeach
    </table>

    {!! $list->render() !!}
@endsection
