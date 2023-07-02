<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\File;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $role_id
 * @property string $nom_societe
 * @property string $siege_social
 * @property string $description
 * @property string $pays
 * @property string $ville
 * @property string $prenom
 * @property string $nom
 * @property string $t_contact
 * @property string $telephone
 * @property string $logo
 * @property string $image
 * @property int|null $valider
 * @property string $code_postal
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $iscolaborate
 * @property int $valide
 * @property int $suspend
 * @property string $package_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Candidature> $candidateure
 * @property-read int|null $candidateure_count
 * @property-read \App\Models\Card|null $card
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chat> $chat
 * @property-read int|null $chat_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Contact> $contact
 * @property-read int|null $contact_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Demand> $demand
 * @property-read int|null $demand_count
 * @property-read \App\Models\InfoCandidat|null $info
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Offre> $offre
 * @property-read int|null $offre_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCodePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIscolaborate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNomSociete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSiegeSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSuspend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereValide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereValider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVille($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'prenom',
        'nom',
        'nom_societe',
        'siege_social',
        'description',
        'pays',
        'ville',
        't_contact',
        'telephone',
        'logo',
        'image',
        'code_postal',
        'email',
        'password',
        'iscolaborate',
        'valide',
        'suspend',
        'package_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function candidateure(){

        return $this->hasMany(Candidature::class);
    }


    public function offre(){

        return $this->hasMany(Offre::class);
    }
    public function demand(){

        return $this->hasMany(Demand::class);
    }
    public function card(){

        return $this->hasOne(Card::class);
    }

    public function info(){

        return $this->hasOne(InfoCandidat::class);
    }

    public function chat(){
        return $this->hasMany(Chat::class);
    }


    public function contact(){
        return $this->HasMany(Contact::class);
    }



    protected static function booted()
    {
        static::deleting(
            function ($user) {
            // Delete user's profile picture when they delete their account
                if ($user->image) {
                    File::delete(public_path('images/candidat/' . $user->image));
                }
                if ($user->logo) {
                    File::delete(public_path('images/recruteure/' . $user->logo));
                }
            }
        );
    }
}


