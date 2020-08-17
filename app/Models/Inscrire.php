<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id_annee
 * @property int $id_utilisateur
 * @property int $id_licence
 * @property string $date_inscription
 * @property Annee $annee
 * @property Licence $licence
 * @property Utilisateur $utilisateur
 */
class Inscrire extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inscrire';
    protected $primaryKey = ['id_annee', 'id_utilisateur'];
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_annee', 'id_utilisateur', 'id_licence', 'date_inscription'];

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
    public function annee()
    {
        return $this->belongsTo('App\Models\Annee', 'id_annee', 'id_annee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function licence()
    {
        return $this->belongsTo('App\Models\Licence', 'id_licence', 'id_licence');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', 'id_utilisateur', 'id_utilisateur');
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_annee', '=', $this->getAttribute('id_annee'))
            //->where('id_licence', '=', $this->getAttribute('id_licence'))
            ->where('id_utilisateur', '=', $this->getAttribute('id_utilisateur'));
        return $query;
    }
}
