<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id_utilisateur
 * @property string $uui
 * @property string $matricule
 * @property string $nom
 * @property string $prenom
 * @property string $telephone
 * @property string $email
 * @property string $password
 * @property int $type
 * @property string $remember_token
 * @property Enseigner[] $enseigners
 * @property Inscrire[] $inscrires
 */
class Utilisateur extends Authenticatable
{
    use Notifiable;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'utilisateur';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_utilisateur';

    /**
     * @var array
     */
    protected $fillable = ['uuid', 'matricule', 'nom', 'prenom', 'telephone', 'email', 'password', 'type', 'remember_token', 'id_departement'];

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     * 
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement', 'id_departement', 'id_departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enseigners()
    {
        return $this->hasMany('App\Models\Enseigner', 'id_utilisateur', 'id_utilisateur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscrires()
    {
        return $this->hasMany('App\Models\Inscrire', 'id_utilisateur', 'id_utilisateur');
    }

    public function nomComplet()
    {
        return "{$this->prenom} {$this->nom}";
    }

    public function isChef()
    {
        if ($this->departement == null) {
            return false;
        }
        
        return $this->departement->utilisateur->is($this);
    }

    public function isAdmin()
    {
        return ($this->type == 1) ? true:false;
    }

    public function isEtudiant()
    {
        return ($this->type == 4) ? true:false;
    }
}
