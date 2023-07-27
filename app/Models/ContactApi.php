<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactApi extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country_code', "phone_number", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritesByUser()
    {
        return $this->belongsToMany(User::class, Favorite::class);
    }
}
