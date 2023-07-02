<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Offre
 *
 * @property int $id
 * @property string $ville
 * @property string $secteur
 * @property string $title
 * @property string $description
 * @property string $salaire
 * @property string $type_contrat
 * @property string $niveau_etude
 * @property string $niveau_experience
 * @property string $langue
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidature|null $candidateure
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Offre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereLangue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereNiveauEtude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereNiveauExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereSalaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereSecteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereTypeContrat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offre whereVille($value)
 * @mixin \Eloquent
 */
class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'title',
        'ville',
        'secteur',
        'description',
        'salaire',
        'type_contrat',
        'niveau_etude',
        'niveau_experience',
        'langue',
        'user_id',
    ];

    
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function candidateure(){

        return $this->belongsTo(Candidature::class);
    }

     
    
}

    




