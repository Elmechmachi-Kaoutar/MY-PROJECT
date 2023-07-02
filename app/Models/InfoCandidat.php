<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InfoCandidat
 *
 * @property int $id
 * @property string $niveau_etude
 * @property string $niveau_experience
 * @property string $secteur_actuel
 * @property string $remuneration_actuelle
 * @property string $cv
 * @property string $lettre_motivation
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat query()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereLettreMotivation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereNiveauEtude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereNiveauExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereRemunerationActuelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereSecteurActuel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoCandidat whereUserId($value)
 * @mixin \Eloquent
 */
class InfoCandidat extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'cv',
        
        'niveau_etude',
        'niveau_experience',
        'secteur_actuel',
        'remuneration_actuelle',

        'lettre_motivation',
        'user_id',
    ];


    public function user(){

        return $this->belongsTo(User::class);
    }
    
 
}
