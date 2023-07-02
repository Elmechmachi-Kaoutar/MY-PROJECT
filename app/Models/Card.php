<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Card
 *
 * @property int $id
 * @property string $holder
 * @property string $card_number
 * @property string $expire
 * @property string $cvv
 * @property int $user_id
 * @property int $montant
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCvv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereHolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUserId($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'holder',
        'card_number',
        'expire',
        'cvv',
        'user_id',
        'montant'
    ];


    public function user(){
        return $this->hasOne(User::class);
    }


}
