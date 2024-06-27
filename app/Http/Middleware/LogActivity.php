<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!Auth::check()) {
            return $response;
        }

        // Catat aktivitas jika user sudah login
        if ($request->path() !== 'logout') {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => $this->formatActivityMessage($request)
            ]);
        } else {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Logged out from the system'
            ]);
        }

        return $response;
    }

    protected function formatActivityMessage(Request $request)
    {
        $method = $request->method();
        $path = $request->path();

        switch ($method) {
            case 'GET':
                return "Accessed {$path}";
            case 'POST':
                return "Inserted data at {$path}";
            case 'PUT':
            case 'PATCH':
                return "Updated data at {$path}";
            case 'DELETE':
                return "Deleted data at {$path}";
            default:
                return "Performed {$method} request to {$path}";
        }
    }
}