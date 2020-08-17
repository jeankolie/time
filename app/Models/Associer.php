<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_matiere
 * @property int $id_departement
 * @property Departement $departement
 * @property Matiere $matiere
 */
class Associer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'associer';

    /**
     * @var array
     */
    protected $fillable = ['id_matiere', 'id_departement'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matiere()
    {
        return $this->belongsTo('App\Models\Matiere', 'id_matiere', 'id_matiere');
    }
}
