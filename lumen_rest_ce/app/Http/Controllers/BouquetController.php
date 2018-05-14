<?php
namespace App\Http\Controllers;
use App\Bouquet;
use Illuminate\Http\Request;


class BouquetController extends Controller
		{
		public function showAllBouquet() {
		return response()->json(Bouquet::all()); }

		public function showOneBouquet($numBou) {
		return response()->json(Bouquet::find($numBou)); }

		public function create(Request $request) {
		$Bouquet = Bouquet::create($request->all()); 
		return response()->json($Bouquet, 201);
		}

		public function update($id, Request $request) {
		$Bouquet = Bouquet::findOrFail($id); $Bouquet->update($request->all());
		return response()->json($Bouquet, 200); }

		public function delete($id) {
		Bouquet::findOrFail($numBou)->delete();
		return response('Deleted Successfully', 200); }
}
