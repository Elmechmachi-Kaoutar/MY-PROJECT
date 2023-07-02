<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Candidature
 *
 * @property int $id
 * @property int $info_candidat_id
 * @property int $user_id
 * @property int $offre_id
 * @property int $valider
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Offre $offre
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereInfoCandidatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereOffreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidature whereValider($value)
 * @mixin \Eloquent
 */
class Candidature extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'info_candidat_id',
        'offre_id',
        'user_id',
        'valider',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function offre(){
        return $this->belongsTo(Offre::class);
    }


}
