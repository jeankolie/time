<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_licence
 * @property int $id_departement
 * @property string $nom
 * @property string $slug
 * @property int $ordre
 * @property Departement $departement
 * @property Inscrire[] $inscrires
 * @property Semestre[] $semestres
 */
class Licence extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'licence';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_licence';

    /**
     * @var array
     */
    protected $fillable = ['id_departement', 'nom', 'slug', 'ordre'];

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
    public function inscrires()
    {
        return $this->hasMany('App\Models\Inscrire', 'id_licence', 'id_licence');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function semestres()
    {
        return $this->hasMany('App\Models\Semestre', 'id_licence', 'id_licence');
    }
}
