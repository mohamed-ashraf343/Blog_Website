<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function update(Request $request) {
        Setting::create($request->all());
        // Setting::create($request->all());
      return  redirect()->route('dashbord.settings');
    }
}
