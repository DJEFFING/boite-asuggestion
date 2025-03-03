<?php

namespace App\Models;

use App\Models\Suggestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprove extends Model
{
    use HasFactory;
    protected $fillable = [
        'suggestion_id',
    ];

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }
}
