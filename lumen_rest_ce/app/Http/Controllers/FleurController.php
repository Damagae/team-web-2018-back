<?php
namespace App\Http\Controllers;
use App\Fleur;
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
}
