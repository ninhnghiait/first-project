<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
    	$lang = $request->lang;
    	$request->session()->put('locale', $lang);
    }
}
