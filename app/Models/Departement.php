<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_departement
 * @property int $id_utilisateur
 * @property string $nom
 * @property string $slug
 * @property Utilisateur $utilisateur
 * @property Matiere[] $matieres
 * @property Licence[] $licences
 * @property Utilisateur[] $utilisateurs
 */
class Departement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'departement';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_departement';

    /**
     * @var array
     */
    protected $fillable = ['id_utilisateur', 'nom', 'slug', 'import'];

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
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'id_utilisateur', 'id_utilisateur');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function matieres()
    {
        return $this->belongsToMany('App\Models\Matiere', 'associer', 'id_departement', 'id_matiere');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licences()
    {
        return $this->hasMany('App\Models\Licence', 'id_departement', 'id_departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function utilisateurs()
    {
        return $this->hasMany('App\Models\Utilisateur', 'id_departement', 'id_departement');
    }
}
