<?php

namespace App\Listeners;

use App\Events\ActivityLogged;
use App\Models\ActivityLog;

class LogActivity
{
    public function __invoke(ActivityLogged $event): void
    {
        ActivityLog::create([
            'user_id' => $event->userId,
            'table_name' => $event->table_name,
            'target_id' => $event->target_id,
            'action' => $event->action,
        ]);
    }
}
