<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function register(Request $req){
        return view('user/register');
    }

    public function registerProcess(Request $req){
        $data = $req->all();

        $user = User::where('email','=',$data['email'])->first();

        if($user){
            return back()->with('fm', '이미 존재하는 사용자')->withInput();
        }

        $rules = [
            'email'=>['required', 'regex:[a-zA-Z0-9_]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,3}$/'],
            'name'=>['required'],
            'password'=>['required','confirmed'],
            'password_confirmation'=>['required']
        ];

        $message = [
            'email.required'=>'이메일은 반드시 입력해주세요',
            'email.regex'=>'이메일 형식으로 입력해주세요',
            'name.required'=>'이름을 입력해주세요',
            'password.required'=>'비밀번호를 입력하세요',
            'password.confirmed'=>'비밀번호 확인은 일치해야 합니다'
        ];

        $validator = \Validator::make($data, $rules, $message);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        if($data['password'] != $data['password_confirmed']){
            return back()->with('fm','비밀번호가 일치하지 않음')->withInput();
        }

        User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>bcrypt($data['password'])]);

        return redirect('/')->with('fm', '성공적 회원가입');
    }

    public function loginProcess(Request $req){

        $data = $req->all();
        $result = auth()->attempt(['email'=>$data['email'],'password'=>$data['password']]);

        if($result){
            return redirect('/')->with('fm','성공적 로그인');
        }else{
            return back()->with('fm','로그인 실패');
        }
    }

    public function logoutProcess(Request $req){
        auth()->logout();
        return redirect('/')->with('fm','로그아웃');
    }
}


