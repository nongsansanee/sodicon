<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use \App\User;
use Inertia\Inertia;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
         //----------driver จะไปอ่าน services.php  parameter  ต้องตั้งชื่อตรงกัน ในที่นี่คือ google ต้องตรงกับในไฟล์ services.php------------
        $user = Socialite::driver('google')->user();
       

       

        //-------------dd() = die dump---------------
        // dd($user);

        //-------------- All Providers----------------
        // $user->getId();
        // $user->getNickname();
        // $user->getName();
        // $user->getEmail();
        // $user->getAvatar();

        // return $user->getId();

        // session(['googleUser'=> $user]);

        //--------find google+userId in users table-----------

            $user_count = \App\User::where([
                                        ['social_id','=',$user->getId()],
                                        ['social_name','=','google']
                                    ])->count();

        //-----------if not found => new user => redirect to register page-------------
           if($user_count==0){
               //redirect to register page
            //    return Inertia::render('Welcome',[]);
               return Inertia::render('Register', [
                                            'social_id'=>$user->getId(),
                                            'name'=>$user->getName(),
                                            'email'=>$user->getEmail(),
                                            'avatar'=>$user->getAvatar(),
               ]);
            //    return view('register',[
            //                             'social_id'=>$user->getId(),
            //                             'name'=>$user->getName(),
            //                             'email'=>$user->getEmail(),
            //                             'avatar'=>$user->getAvatar(),
            //                           ]);
            //    return $user->getName();
           }

        //------------- if found =>  login user-----------------
        //auth()

        if(!$user->getEmail()){

        }

        return redirect('/')->with('user',$user);
        // $user->token;
    }

    public function register(){
        return "register";
        return Request::all();
    }
}
