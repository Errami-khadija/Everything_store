<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
   public function loginPage()
    {
        return view('admin.login'); // Your admin login blade
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

    public function logout()
    {
        session()->forget('admin_id');
        return redirect('/admin/login');
    }
}
