<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table='Florist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numUser', 'mdp', 'mail', 'nom', 'nomMag'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


// Un user a plusieurs commandes.
  public function UserCommandes()
        {
            return $this->hasMany('App\Commande');
        }


}
