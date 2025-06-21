<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->paginate(15);

        return view('admin.notifications.index', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();

        if ($notification->type === 'adocao' || $notification->type === 'apadrinhamento') {
            return redirect()->route('admin.animals.forms.show', [
                'type' => $notification->type,
                'id' => $notification->form_id
            ]);
        }

        return back()->with('success', 'Notificação marcada como lida');
    }

    public function markAllAsRead()
    {
        auth()->user()->notifications()->update(['is_read' => true]);

        return back()->with('success', 'Todas as notificações marcadas como lidas');
    }
}
