<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'table_name', 'target_id', 'action'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
