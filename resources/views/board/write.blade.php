@extends('layout/master')

@section('content')
    <h1>글쓰기</h1>
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="title">제목</label>
            <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : ''}}"
                   id="title" name="title" placeholder="제목을 입력">
            <div class="invalid-feedback">
                {!! $errors->first('title', "<span class='form-error'> :message </span>") !!}
            </div>
        </div>
        <div class="form-group">
            <label for="content">글 내용</label>
            <textarea class="form-control  {{ $errors->has('content') ? 'is-invalid' : ''}}" id="content"
                      rows="3" name="content"></textarea>
            <div class="invalid-feedback">
                {!! $errors->first('content', "<span class='form-error'> :message </span>") !!}
            </div>
        </div>
        <button type="submit" class="btn btn-primary">글작성</button>
    </form>
@endsection