<?php

namespace App\Http\Controllers\Admin;
use App\Models\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
         public function index()
    {
      
        $settings = Setting::first();

        return view('admin.sections.settings-section', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'store_name' => 'required|string|max:255',
            'store_description' => 'nullable|string',
            'delivery_fee' => 'required|numeric',
            'store_email' => 'nullable|email',
            'store_phone' => 'nullable|string'
        ]);
 $data['cash_on_delivery'] = $request->has('cash_on_delivery');

        Setting::updateOrCreate(
            ['id' => 1],
            $data
        );

        return back()->with('success', 'Settings updated successfully!');
    }
}
