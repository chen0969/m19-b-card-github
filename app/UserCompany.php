<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['user_id', 'company_name', 'company_description', 'facebook', 'instagram', 'line', 'twitter', 'linkedin', 'discord', 'pinterest', 'threads', 'tiktok', 'youtube', 'wechat', 'whatsapp', 'other'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
