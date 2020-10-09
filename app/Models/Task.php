<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityAttribute($id)
    {
        $arrayMap = [0 => 'Low', 1 => 'Medium', 2 => 'High'];
        return $arrayMap[$id];
    }

    public function scopeHighPriority($query)
    {
        return $query->where('priority', 2);
    }

}
