<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id_semestre
 * @property int $id_salle
 * @property int $id_matiere
 * @property int $id_annee
 * @property string $jour
 * @property string $interval
 * @property string $professeur
 * @property Annee $annee
 * @property Matiere $matiere
 * @property Salle $salle
 * @property Semestre $semestre
 */
class Enseigner extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'enseigner';
    protected $primaryKey = ['id_semestre', 'id_annee', 'jour', 'interval'];
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_semestre', 'id_salle', 'id_matiere', 'id_annee', 'jour', 'interval', 'id_utilisateur'];

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
    public function matiere()
    {
        return $this->belongsTo('App\Models\Matiere', 'id_matiere', 'id_matiere');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salle()
    {
        return $this->belongsTo('App\Models\Salle', 'id_salle', 'id_salle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semestre()
    {
        return $this->belongsTo('App\Models\Semestre', 'id_semestre', 'id_semestre');
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
            ->where('interval', '=', $this->getAttribute('interval'))
            ->where('id_semestre', '=', $this->getAttribute('id_semestre'))
            ->where('jour', '=', $this->getAttribute('jour'));
        return $query;
    }
}
