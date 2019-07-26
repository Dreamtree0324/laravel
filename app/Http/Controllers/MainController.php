<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function register(Request $req)
    {
        return view('user/register');
    }

    public function registerProcess(Request $req)
    {
        $data = $req->all();

        $user = User::where('email', '=', $data['email'])->first();

        if($user){
            return back()->with('fm', '이미 존재하는 사용자입니다.')->withInput();
        }

        $rules = [
            'email'=> ['required', 'regex:/^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,3}$/'],
            'name'=>['required'],
            'password'=>['required', 'confirmed'],
            'password_confirmation' => ['required']
        ];

        $message = [
            'email.required' => '이메일은 반드시 입력되어야 합니다.',
            'email.regex' => '이메일은 반드시 이메일 형식이어야 합니다.',
            'name.required' => '이름은 필수 항목입니다.',
            'password.required' => '비밀번호는 반드시 입력해야 합니다.',
            'password.confirmed' => '비밀번호와 확인은 일치해야 합니다.'
        ];

        $validator = \Validator::make($data, $rules, $message);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }


        User::create(['name'=>$data['name'],
                    'email'=>$data['email'],
                    'password'=>bcrypt($data['password'])]);

        return redirect('/')->with('fm', '성공적으로 회원가입');
    }

    public function loginProcess(Request $req)
    {
        $data = $req->all();
        $result = auth()->attempt(['email'=>$data['email'], 'password'=>$data['password']]);

        if($result){
            return redirect('/')->with('fm', '성공적으로 로그인되었습니다.');
        }else {
            return back()->with('fm', '아이디와 비밀번호가 올바르지 않습니다.');
        }
    }

    public function logoutProcess(Request $req)
    {
        auth()->logout();
        return redirect('/')->with('fm', '로그아웃 되었습니다.');
    }
}
