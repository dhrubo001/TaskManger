<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActivityLogged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $userId;

    public $table_name;

    public $target_id;

    public $action;

    public function __construct($userId, $table_name, $target_id, $action)
    {
        $this->userId = $userId;
        $this->table_name = $table_name;
        $this->target_id = $target_id;
        $this->action = $action;
    }
}
