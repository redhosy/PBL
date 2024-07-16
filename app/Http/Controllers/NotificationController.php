<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();

        return response()->json($notifications);
    }

    // app/Http/Controllers/NotificationController.php

    public function markAllAsRead(Request $request)
    {
        // Hapus semua notifikasi
        auth()->user()->notifications()->delete();

        // Response sukses
        return response()->json(['message' => 'All notifications marked as read.']);
    }
}
