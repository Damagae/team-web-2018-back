<?php
namespace App\Http\Controllers;
use App\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 


class CommandeController extends Controller
        {
        public function showAllCommande() 
            {
            return response()->json(Commande::all());
            }

        public function showOneCommande($numCom) 
            {
            return response()->json(Commande::find($numCom)); 
            }

        public function create(Request $request) 
        {
            $Commande = Commande::create($request->all()); 
            return response()->json($Commande, 201);
        }

        public function update($numCom, Request $request)
        {
            $Commande = Commande::findOrFail($numCom); $Commande->update($request->all());
            return response()->json($Commande, 200); 
        }

        public function delete($numCom) {
            Commande::findOrFail($numCom)->delete();
            return response('Deleted Successfully', 200); 
        }



// ROUTE 11 - Commandes en cours par User classées par Nom Alphabétique de Client
        public function currentCommandeName($numeroUser) 
        {

        $results=DB::table('Commande')
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('User','controle.numUser','=','User.numUser')
             ->join('passe','passe.numCom','=','Commande.numCom')
             ->join('Client','Client.numCli','=','passe.numCli')
             ->select('Client.*','Commande.*')
             ->where(['User.numUser' => $numeroUser])
             ->orderBy('Client.nom', 'asc')
             ->get();
             return $results; 
        }

// ROUTE 12 - Commandes en cours par User classées par date
        public function currentCommandeDate($numeroUser) 
        {

       $results=DB::table('Commande')
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('User','controle.numUser','=','User.numUser')
             ->join('passe','passe.numCom','=','Commande.numCom')
             ->join('Client','Client.numCli','=','passe.numCli')
             ->select('Client.*','Commande.*')
             ->where(['User.numUser' => $numeroUser])
             ->orderBy('Commande.dateCommande', 'asc')
             ->get();
             return $results; 
        }


}               

