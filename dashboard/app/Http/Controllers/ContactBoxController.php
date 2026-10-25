<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactBoxController extends Controller
{
    private const KEYS = [
        'phone_primary',
        'phone_secondary',
        'email_primary',
        'email_sales',
        'address',
        'hours_weekday',
        'hours_saturday',
    ];

    public function edit()
    {
        $settings = SiteSetting::whereIn('setting_key', self::KEYS)->orderBy('sort_order')->get();

        return view('contact-boxes.edit', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::whereIn('setting_key', self::KEYS)->orderBy('sort_order')->get();

        $rules = [];
        foreach ($settings as $setting) {
            $rules['values.'.$setting->setting_key] = ['nullable', 'string', 'max:500'];
        }

        $data = $request->validate($rules);

        foreach ($settings as $setting) {
            $setting->update([
                'setting_value' => $data['values'][$setting->setting_key] ?? '',
            ]);
        }

        return redirect()
            ->route('contact-boxes.edit')
            ->with('status', 'Contact boxes saved. The public site will show these details.');
    }
}
