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
        'numCom', 'numCli', 'numUser' ,'prixtotal', 'etat','dateCommande', 'popularite', 'dateLivraison'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

// Les Commandes appartiennent à un Client à la fois 
     public function client() 
    {
         return $this->belongsTo('App\Client');
    }

// Les Commandes appartiennent à un User à la fois 
     public function user() 
    {
         return $this->belongsTo('App\User');
    }

     

}
