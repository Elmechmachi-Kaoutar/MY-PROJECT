<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Demand
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
 * @property string $etat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Demand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereEtat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereLangue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereNiveauEtude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereNiveauExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereSalaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereSecteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereTypeContrat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereVille($value)
 * @mixin \Eloquent
 */
class Demand extends Model
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
        'etat'
    ];
    public function user(){

        return $this->belongsTo(User::class);
    } 
}
