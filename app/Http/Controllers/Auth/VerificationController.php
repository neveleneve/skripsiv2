<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use RealRashid\SweetAlert\Facades\Alert;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        // return $request->user()->hasVerifiedEmail()
        //     ?  redirect($this->redirectPath())->withInfo('Email kamu sudah terverifikasi!')
        //     : view('auth.verify');
        if ($request->user()->hasVerifiedEmail()) {
            Alert::alert('Oops!', 'Halaman ga bisa diakses karena e-mail kamu telah terverifikasi!', 'warning');
            return redirect($this->redirectPath());
        } else {
            return view('auth.verify');
        }
    }
    public function verify(Request $request)
    {
        if (!hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (!hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        Alert::alert('Yeay!', 'Email kamu telah terverifikasi! Kamu bisa melanjutkan untuk menawarkan', 'danger');
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect($this->redirectPath())->with('verified', true);
    }
}
