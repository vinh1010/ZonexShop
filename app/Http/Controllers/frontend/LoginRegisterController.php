<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\ChangePasswordRequest;
use App\Http\Requests\frontend\LoginRequest;
use App\Http\Requests\frontend\RegisterRequest;
use App\Http\Requests\frontend\UserProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LoginRegisterController extends Controller
{
    public function login(Request $request){
        $page = $request->page;
        return view('frontend.pages.login',compact('page'));
    }

    // Đăng nhập
    public function post_login(LoginRequest $request){
        $email = $request->email_lg;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password ])){
            if($request->page){
                return redirect()->route($request->page);
            }
            else{
                return redirect()->route('home');
            }    
        }
        else{
            return redirect()->route('login')->withError('Email or Password does not exist');
        }
    }

    // Thêm mói user
    public function post_register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name_rs,
            'email' => $request->email,
            'password' => Hash::make($request->password_rs)
        ]);

        if($user){
            return redirect()->route('login')->withSuccess('Sign Up Success');
        }  
    }

    // Đăng xuất
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function my_account(){
        if(Session::has('success_profile')){
            Alert::success('', Session::get('success_profile'));
        }
        if(Session::has('success_change_pass')){
            Alert::success('', Session::get('success_change_pass'));
        }
        if(Session::has('error_change_pass')){
            Alert::error('', Session::get('error_change_pass'));
        }
        return view('frontend.pages.myAccount');
    }

    public function user_profile(UserProfile $request){
        $id = $request->id;
        if($request->avatar){
            $user = User::find($id);
            if($user->avatar){
                $file = $request->avatar;
                $name = $file->getClientOriginalName();
                $file->move(base_path('public/images/avatars'),$name);
                unlink('images/avatars/'.$user->avatar);
            }
            else{
                $file = $request->avatar;
                $name = $file->getClientOriginalName();
                $file->move(base_path('public/images/avatars'),$name);
            }
            $user = User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'avatar' => $name,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
            ]);
        }
        else{
            $user = User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
            ]);
        }
        return redirect()->route('my_account')->with('success_profile','Update Profile Successfully');
    }

    public function change_password(ChangePasswordRequest $request){
        $id = $request->id;
        $password  = $request->password;
        $user = User::find($id);
        $checkPass = password_verify($password, $user->password);
        if($checkPass){
            User::find($id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('my_account')->with('success_change_pass','Update Password Successfully');
        }
        else{
            return redirect()->route('my_account')->with('error_change_pass','Password Entered Is Incorrect');
        }
    }

    public function forgot(){
        return view('frontend.pages.forgotPass');
    }

    public function post_email(Request $request){
        $email = $request->email;
        $now = Carbon::now();
        $title_mail =  "Password resets $email".' '.$now;
        $check_user = User::where('email',$email)->first();
        if(!$check_user){
            return redirect()->route('forgot')->withError('Email does not exist'); 
        }
        else{
            $token_random = Str::random(10);
            $customer = User::find($check_user->id);
            $customer->remember_token = $token_random;
            $customer->save();
            
            $to_email = $email;
            $link_reset_pass = url('/update-new-pass?email='.$to_email.'?token='.$token_random);
            $data = array("name"=>$title_mail,"body"=>$link_reset_pass,"email"=>$email);
            Mail::send('frontend.pages.forgetPassNotify', ['data'=>$data], function ($message) use($title_mail,$data) 
            {
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            return redirect()->route('forgot')->withSuccess('Password reset link has been sent to your email');

        }
    }

    public function update_pass(){
        return view('frontend.pages.newPass');
    }

    public function post_new_pass(Request $request){
        $token_random = Str::random(10);
        $check_form = User::where('email',$request->email)->where('remember_token',$request->token)->first();
        if($check_form){
            User::find($check_form->id)->update([
                'password' => Hash::make($request->password),
                'remember_token' => $token_random
            ]);
            return redirect()->route('forgot')->withSuccess('Password has been updated. Please go back to login');
        }
        else{
            return redirect()->route('forgot')->withError('Link has expired, please re-enter your email'); 
        }
    }

}
