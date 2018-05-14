<?php
namespace App\Http\Controllers;
use App\Commande;
use Illuminate\Http\Request;


class CommandeController extends Controller
        {
        public function showAllCommande() {
        return response()->json(Commande::all()); }

        public function showOneCommande($numCom) {
        return response()->json(Commande::find($numCom)); }

        public function create(Request $request) {
        $Commande = Commande::create($request->all()); 
        return response()->json($Commande, 201);
        }

        public function update($numCom, Request $request) {
        $Commande = Commande::findOrFail($numCom); $Commande->update($request->all());
        return response()->json($Commande, 200); }

        public function delete($numCom) {
        Commande::findOrFail($numCom)->delete();
        return response('Deleted Successfully', 200); }





        // 12 - Commandes en cours par user classées par date 
        public function currentCommande($numeroClient) {

                  $results=Commande::where(['numCli' => $numeroClient, 'etat' => 'en cours'])
                  ->orderBy('dateCommande', 'desc')
                  ->get();

        return $results; }


}               

