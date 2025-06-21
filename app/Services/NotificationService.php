<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\User;

class NotificationService
{
    public static function create($type, $message, $relatedId = null, $relatedType = null, $userId = null, $formId = null)
    {
        $users = User::all();
        $admins = Admin::all();
        $allRecipients = $users->merge($admins);

        foreach ($allRecipients as $recipient) {
            Notification::create([
                'type' => $type,
                'message' => $message,
                'user_id' => $userId ?? auth()->id(),
                'related_id' => $relatedId,
                'related_type' => $relatedType,
                'form_id' => $formId,
                'notifiable_id' => $recipient->id,
                'notifiable_type' => get_class($recipient),
                'is_read' => false
            ]);
        }
    }
}
