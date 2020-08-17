<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_salle
 * @property string $nom
 * @property string $slug
 */
class Salle extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'salle';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_salle';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'capacite', 'slug'];

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

}
