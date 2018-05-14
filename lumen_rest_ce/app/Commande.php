<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Commande extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table='Commande';

 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numCom', 'numCli', 'etat','dateCommande', 'popularite', 'dateLivraison'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

     public function client() 
    {
         return $this->belongsTo('App\Client');
    }

     

}
