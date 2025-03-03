<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRole extends Model
{
    use HasFactory;
    /**
     * Le nom de la table associée au modèle.
     *
     * @var string
     */

    /**
     * @var array
     */
    protected $table = 'role_user';
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
}
