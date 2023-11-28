<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       
        $credentials = [
            'name' => $request['username'],
            'password' => $request['password'],
        ];

        if(!Auth::attempt(['username' => $request['username'],'password' => $request['password']])) {
            return redirect()->to('login')
            ->withErrors(trans('auth.failed'));
        }

        if (Auth::user() && Auth::user()->role == 1) {
            // Admin user
            return redirect('/admin');
        } elseif (Auth::user() && Auth::user()->role == 2) {
            // Regular user
            return redirect('/employee');
        } else {
            // No role found, handle accordingly
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        }
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // You can leave this empty if you don't need any specific action after authentication.
        // If you have common logic for all users, you can place it here.
    }
}