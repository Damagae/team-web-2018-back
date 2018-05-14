<?php
namespace App\Http\Controllers;
use App\Destinataire;
use Illuminate\Http\Request;


class DestinataireController extends Controller
		{
		public function showAllDestinataire() {
		return response()->json(Destinataire::all()); }

		public function showOneDestinataire($numDes) {
		return response()->json(Destinataire::find($numDes)); }

		public function create(Request $request) {
		$Destinataire = Destinataire::create($request->all()); 
		return response()->json($Destinataire, 201);
		}

		public function update($numDes, Request $request) {
		$Destinataire = Destinataire::findOrFail($numDes); $Destinataire->update($request->all());
		return response()->json($Destinataire, 200); }

		public function delete($numDes) {
		Destinataire::findOrFail($numDes)->delete();
		return response('Deleted Successfully', 200); }
}
