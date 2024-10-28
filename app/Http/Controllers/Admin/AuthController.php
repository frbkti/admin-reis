<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    // Proses register user berdasarkan admin yang dipilih
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'admin_type' => 'required|string|in:hotel,villa_resort,car_bike_rent,cinema,event,tour,airplane,cruiseship_fastboat', // Admin type
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_type' => $request->admin_type,
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke halaman admin yang sesuai
        return $this->redirectToAdmin($user->admin_type);
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Proses login user
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Attempt to login with email and password
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Redirect to the appropriate admin dashboard based on the user's admin_type
            return $this->redirectToAdmin($user->admin_type);
        }
    
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login')->with('success', 'Logout successful');
    }

    // Fungsi untuk mengarahkan ke halaman admin yang sesuai
    protected function redirectToAdmin($adminType)
    {
        switch ($adminType) {
            case 'hotel':
                return redirect('/admin/hotels');
            case 'villa_resort':
                return redirect('/admin/villaresort');
            case 'car_bike_rent':
                return redirect('/admin/car_bike_rent');
            case 'cinema':
                return redirect('/admin/cinema');
            case 'event':
                 return redirect('/admin/event');
            case 'tour':
                 return redirect('/admin/tour'); 
            case 'airplane':
                return redirect('/admin/airplane');
            case 'cruiseship_fastboat':
                return redirect('/admin/cruiseship_fastboat');   
            default:
                return redirect('/admin/login');
        }
    }
}
