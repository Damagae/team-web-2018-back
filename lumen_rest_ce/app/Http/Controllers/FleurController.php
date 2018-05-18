<?php
namespace App\Http\Controllers;
use App\Fleur;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;


class FleurController extends Controller
		{
		public function showAllFleur() {
		return response()->json(Fleur::all()); }

		public function showOneFleur($nomFleu) {
		return response()->json(Fleur::find($nomFleu)); }

		public function create(Request $request) {
		$Fleur = Fleur::create($request->all()); 
		return response()->json($Fleur, 201);
		}

		public function update($nomFleu, Request $request) {
		$Fleur = Fleur::findOrFail($nomFleu); $Fleur->update($request->all());
		return response()->json($Fleur, 200); }

		public function delete($nomFleu) {
		Fleur::findOrFail($nomFleu)->delete();
		return response('Deleted Successfully', 200); }



		// ROUTE 9 - VENTES PAR TYPE DE FLEUR
        public function flowerSales($numeroUser,$numeroPlante) 
        {

        $results=DB::table('Fleur')
             ->join('compose','Fleur.nomFleu','=','compose.numFleu')
             ->join('Bouquet','compose.numBou','=','Bouquet.numBou') 
             ->join('constitue','Bouquet.numBou','=','constitue.numBou')
             ->join('Commande','constitue.numCom','=','Commande.numCom')    
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('User','controle.numUser','=','User.numUser')
             ->select('Commande.*')
             ->where(['User.numUser' => $numeroUser])
             ->where(['Fleur.nomFleu' => $numeroPlante])
             ->get();
             return $results; 
        }
}
