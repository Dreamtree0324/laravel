@extends('layout/master')

@section('content')
    <h2>회원가입</h2>
    <form method="post">
        @csrf
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="staticEmail"
                       placeholder="이메일 입력" name="email"
                       value="{{ old('email') }}">
                <div class="invalid-feedback">
                    {!! $errors->first('email', "<span class='form-error'> :message </span>") !!}
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">이름</label>
            <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" placeholder="이름 입력" name="name"
                       value="{{ old('name') }}">
            </div>
            <div class="invalid-feedback">
                {!! $errors->first('name', "<span class='form-error'> :message </span>") !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="inputPassword" placeholder="비밀번호 입력" name="password">
            </div>
            <div class="invalid-feedback">
                {!! $errors->first('password', "<span class='form-error'> :message </span>") !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPasswordC" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPasswordC" placeholder="비밀번호 확인"
                       name="password_confirmation">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-2">회원가입</button>
    </form>
@endsection