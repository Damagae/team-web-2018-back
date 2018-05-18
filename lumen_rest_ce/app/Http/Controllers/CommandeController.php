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
            $results=DB::table('commande')
                 ->join('controle','commande.numcom','=','controle.numcom')
                 ->join('florist','controle.numuser','=','florist.numuser')
                 ->join('passe','passe.numcom','=','commande.numcom')
                 ->select('commande.*')
                 ->where(['florist.numuser' => $numeroUser])
                 ->get();
            return $results;
        }

        /*
        // ROUTE TEST
        public function AllUserCommandes($numeroUser)
        {
        $results=DB::select("SELECT *
                             FROM Commande
                             LEFT JOIN controle ON (Commande.numCom=controle.numCom)
                             LEFT JOIN Florist ON (controle.numUser=Florist.numUser)
                             LEFT JOIN passe ON (passe.numCom=Commande.numCom)
                             WHERE Florist.numUser=$numeroUser");
             return $results;
        }
        */

        // ROUTE 11 - Commandes en cours par User classées par Nom Alphabétique de Client
        public function currentCommandeName($numeroUser)
        {
            $results=DB::table('commande')
                 ->join('controle','commande.numcom','=','controle.numcom')
                 ->join('florist','controle.numuser','=','florist.numuser')
                 ->join('passe','passe.numcom','=','commande.numcom')
                 ->join('client','client.numcli','=','passe.numcli')
                 ->select('client.*','commande.*')
                 ->where(['florist.numuser' => $numeroUser])
                 ->where('commande.etat','en cours')
                 ->orderBy('client.nom', 'asc')
                 ->get();
            return $results;
        }

        // ROUTE 12 - Commandes en cours par User classées par date
        public function currentCommandeDate($numeroUser)
        {
           $results=DB::table('commande')
                 ->join('controle','commande.numcom','=','controle.numcom')
                 ->join('florist','controle.numuser','=','florist.numuser')
                 ->join('passe','passe.numcom','=','commande.numcom')
                 ->join('client','client.numcli','=','passe.numcli')
                 ->select('client.*','commande.*')
                 ->where(['florist.numuser' => $numeroUser])
                 ->where('commande.etat','en cours')
                 ->orderBy('commande.datecommande', 'asc')
                 ->get();
            return $results;
        }


        // ROUTE 13 - Commandes passées par User classées par Nom Alphabétique de client
        public function oldCommandeName($numeroUser)
        {
            $results=DB::table('commande')
                 ->join('controle','commande.numcom','=','controle.numcom')
                 ->join('florist','controle.numuser','=','florist.numuser')
                 ->join('passe','passe.numcom','=','commande.numcom')
                 ->join('client','client.numcli','=','passe.numcli')
                 ->select('client.*','commande.*')
                 ->where(['florist.numuser' => $numeroUser])
                 ->where('commande.etat','livrée')
                 ->orderBy('client.nom', 'asc')
                 ->get();
            return $results;
        }

        // ROUTE 14 - Commandes passées par User classées par date
        public function oldCommandeDate($numeroUser)
        {
           $results=DB::table('commande')
                 ->join('controle','commande.numcom','=','controle.numcom')
                 ->join('florist','controle.numuser','=','florist.numuser')
                 ->join('passe','passe.numcom','=','commande.numcom')
                 ->join('client','client.numcli','=','passe.numcli')
                 ->select('client.*','commande.*')
                 ->where(['florist.numuser' => $numeroUser])
                 ->where('commande.etat','livrée')
                 ->orderBy('commande.datecommande', 'asc')
                 ->get();
            return $results;
        }



}
