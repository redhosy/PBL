<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Hanya Super Admin yang bisa melihat log aktivitas
        $this->authorize('viewAny', ActivityLog::class);

        $activityLogs = ActivityLog::with('user')->latest()->paginate(10);
        return view('activity.activity', compact('activityLogs'));
    }
}
