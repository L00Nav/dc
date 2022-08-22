<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as User;
use App\Models\System as System;

class Session extends Model
{
    use HasFactory;

    public function getGm()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getSystem()
    {
        return $this->belongsTo(System::class, 'system_id', 'id');
    }

    public function getPlayers()
    {
        return $this->belongsToMany(User::class);
    }
}
