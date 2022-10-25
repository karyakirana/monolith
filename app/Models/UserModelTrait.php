<?php namespace App\Models;

trait UserModelTrait
{
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
