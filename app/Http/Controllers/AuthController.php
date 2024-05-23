<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    /**
     * Bisa disimpan kedatabase aja agar lebih dinamis
     * local ip: 127.0.0.1
     */
    private $WHITE_LIST_IP = ['127.0.0.3'];
    private $ALLOWED_ATTEMPT = 3;

    public function index()
    {
        return view('login');
    }

    public function process(Request $request)
    {
        $IP = $request->ip();
        $username = $request->username;

        $validated =  $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (RateLimiter::tooManyAttempts('failed_login:' . $IP, $this->ALLOWED_ATTEMPT)) {
            $seconds = RateLimiter::availableIn('failed_login:' . $IP);
            $formatedTime = Carbon::now()->addSeconds($seconds)->diffForHumans();
            $message = 'Terlalu banyak percobaan login, silahkan coba lagi dalam ' . $formatedTime;
            return redirect()->back()->with('blocked', $message);
        }

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $validated['email'] = $username;
            unset($validated['username']);
        }

        if (!Auth::attempt($validated, $request->remember)) {
            if (!in_array($IP, $this->WHITE_LIST_IP)) {
                RateLimiter::hit('failed_login:' . $IP, 60 * 1);
            }
            return redirect()->back()->with('error', 'Email/Username tidak terdaftar')->withInput();
        }

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->intended('dashboard');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
