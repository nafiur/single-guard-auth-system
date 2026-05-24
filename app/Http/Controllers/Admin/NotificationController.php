<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Mark all unread notifications as read.
     */
    public function markAsRead(): RedirectResponse
    {
        Auth::guard('web')->user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }

    /**
     * Display a listing of all notifications.
     */
    public function index()
    {
        $notifications = Auth::guard('web')->user()->notifications()->paginate(20);

        return view('admin.notifications.index', compact('notifications'));
    }
}

