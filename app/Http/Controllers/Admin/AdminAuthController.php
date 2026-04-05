<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
   public function loginPage()
    {
        return view('admin.login'); 
    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid email or password');
        }

        // Store admin session
        session(['admin_id' => $admin->id]);

        return redirect('/admin/dashboard');
    }

    public function registerPage()
{
    return view('admin.register');
}

public function register(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|min:6|confirmed',
    ]);

    // Create admin
    $admin = Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Auto login after register
    session(['admin_id' => $admin->id]);

    return redirect('/admin/dashboard')->with('success', 'Admin created successfully');
}

    public function logout()
    {
        session()->forget('admin_id');
        return redirect('/admin/login');
    }
}
