<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactApi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'country_code', "phone_number", "user_id", "is_favorite", "email", "company", "job_title", "birthday"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritesByUser()
    {
        return $this->belongsToMany(User::class, Favorite::class);
    }
}
