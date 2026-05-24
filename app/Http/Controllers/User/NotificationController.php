<?php

namespace App\Http\Controllers\User;

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
        $user = Auth::guard('web')->user() ?: Auth::user();
        if ($user) {
            $user->unreadNotifications->markAsRead();
        }

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }

    /**
     * Display a listing of all notifications.
     */
    public function index()
    {
        $user = Auth::guard('web')->user() ?: Auth::user();
        $notifications = $user->notifications()->paginate(20);

        return view('user.notifications.index', compact('notifications'));
    }
}
