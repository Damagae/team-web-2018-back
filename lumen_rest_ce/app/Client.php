<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Client extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table='Client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numCli', 'mail', 'nom', 'club'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


// Un client peut avoir plusieurs commandes. 
    public function ClientCommandes() 
        {
            return $this->hasMany('App\Commande');
        }
}
