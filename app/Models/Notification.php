<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'description',
        'user_id',
        // autres attributs...
    ];
}
