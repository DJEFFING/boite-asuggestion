<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comment_text',
        'suggestion_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function suggestion(){
        return $this->belongsToMany(Suggestion::class);
    }
}
