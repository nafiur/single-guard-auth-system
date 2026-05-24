<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Mock stats for now - in a real app, these would come from models
        $stats = [
            'orders_count' => 0,
            'wishlist_count' => 0,
            'recent_notifications' => [],
        ];

        if ($user->user_type === 'vendor') {
            $stats['total_sales'] = 0;
            $stats['products_count'] = 0;
            return view('user.vendor-dashboard', compact('user', 'stats'));
        }

        return view('user.dashboard', compact('user', 'stats'));
    }
}
