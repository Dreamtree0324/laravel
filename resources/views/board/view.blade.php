@extends('layout/master')

@section('content')
    <h1>{{$data->title}}</h1>

    <div class="card">
        <div class="card-header">
            <span>{{$data->user()->first()->name}}</span>
            <span>{{$data->created_at}}</span>
        </div>
        <div class="card-body">
            <img src="/image/{{$data->file}}" alt="">
            {{$data->content}}
        </div>
    </div>

@endsection