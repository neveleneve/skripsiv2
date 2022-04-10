<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        alert('Yeay!!!', 'Kamu berhasil masuk!', 'success')->showConfirmButton('OK', '#198754')->autoClose(2000);
        return redirect()->intended($this->redirectPath());
    }

    public function username()
    {
        return 'username';
    }
}
