<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;

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
     *return login interface
     *
     * @return View|Redirector
     */
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        } else {
            return view('login');
        }
    }

    /**
     * check account and login
     *
     * @param Login $request
     * @return RedirectResponse
     */
    public function postLogin(Login $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/dashboard');
        } else {
            return redirect('login')->with('error', 'Email and password incorect');
        }
    }

    /**
     * after logout return login interface
     *
     * @return Redirector
     */
    public function logout()
    {
        if (!Auth::logout()) {
            return redirect('admin/dashboard');
        } else {
            return redirect('login');
        }
    }
}

