<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*
    * @param  array
    * @return Illuminate\Contracts\Validation\Validator
    */

    public function register(Request $request){
        if($request->isMethod('post')){

            //追加記述↓
            $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40|unique:users,mail',
            'password' => 'required|string|min:8|max:20|confirmed',
        ]);

            //判定
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = bcrypt($request->input('password'));
            //格納
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => $password,
            ]);

            //登録完了ページへ（ユーザーネームを表示させるために「$username」を添えて）


            return redirect('added')->with('username',$username);
        }
        return view('auth.register');
    }

    public function added(){
        $value = session('username'); //sessionデータから$usernameを取得
        //dd($value);//ユーザー名受け渡しでバック用
        return view('auth.added',compact('value'));
    }
}
