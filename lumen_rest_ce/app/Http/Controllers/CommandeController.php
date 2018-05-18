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

// ROUTE TEST 
        public function AllUserCommandes($numeroUser) 
        {
        $results=DB::table('Commande')
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('User','controle.numUser','=','User.numUser')
             ->join('passe','passe.numCom','=','Commande.numCom')
             ->select('Commande.*')
             ->where(['User.numUser' => $numeroUser])
             ->get();
             return $results; 
        }

    /*    // ROUTE TEST 
        public function AllUserCommandes($numeroUser) 
        {
        $results=DB::select("SELECT * 
                             FROM Commande
                             LEFT JOIN controle ON (Commande.numCom=controle.numCom)
                             LEFT JOIN User ON (controle.numUser=User.numUser)
                             LEFT JOIN passe ON (passe.numCom=Commande.numCom)
                             WHERE User.numUser=$numeroUser");
             return $results; 
        }

*/ 
        
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
             ->where('Commande.etat','en cours')
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
             ->where('Commande.etat','en cours')
             ->orderBy('Commande.dateCommande', 'asc')
             ->get();
             return $results; 
        }


// ROUTE 13 - Commandes passées par User classées par Nom Alphabétique de Client
        public function oldCommandeName($numeroUser) 
        {

        $results=DB::table('Commande')
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('User','controle.numUser','=','User.numUser')
             ->join('passe','passe.numCom','=','Commande.numCom')
             ->join('Client','Client.numCli','=','passe.numCli')
             ->select('Client.*','Commande.*')
             ->where(['User.numUser' => $numeroUser])
             ->where('Commande.etat','livrée')
             ->orderBy('Client.nom', 'asc')
             ->get();
             return $results; 
        }

// ROUTE 14 - Commandes passées par User classées par date
        public function oldCommandeDate($numeroUser) 
        {

       $results=DB::table('Commande')
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('User','controle.numUser','=','User.numUser')
             ->join('passe','passe.numCom','=','Commande.numCom')
             ->join('Client','Client.numCli','=','passe.numCli')
             ->select('Client.*','Commande.*')
             ->where(['User.numUser' => $numeroUser])
             ->where('Commande.etat','livrée')
             ->orderBy('Commande.dateCommande', 'asc')
             ->get();
             return $results; 
        }



}               

