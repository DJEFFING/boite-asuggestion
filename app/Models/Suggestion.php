<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Commentaire;
use App\Models\Aprove;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suggestion extends Model
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
    protected $table = 'suggestions';
    protected $fillable = [
        'description',
        'object',
        'categorie_id',
        'status',
        'vrai_nom',
        'filiere',
        'niveau_etude',
        'specialite',
        'user_id'
    ];


    public function likes()
        {
            return $this->hasMany(Like::class);
        }

        public function commentaires() {
            return $this->hasMany(Commentaire::class);
        }

    public function aprouve()
    {
        return $this->hasMany(Aprove::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  public function categorie():BelongsTo{

    return $this->belongsTo(Categorie::class);
  }
}
