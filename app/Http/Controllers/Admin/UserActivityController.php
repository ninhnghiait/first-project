<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ActivityLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class UserActivityController extends Controller
{
    public function index()
    {
        $items = Activity::latest()->paginate(50);
        return view('user-activities.index', compact('items'));
    }
}
