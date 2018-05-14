<?php
namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
		{
		public function showAllClient() {
		return response()->json(Client::all()); }

		public function showOneClient($numBou) {
		return response()->json(Client::find($numCli)); }

		public function create(Request $request) {
		$Client = Client::create($request->all()); 
		return response()->json($Client, 201);
		}

		public function update($numCli, Request $request) {
		$Client = Client::findOrFail($numCli); $Client->update($request->all());
		return response()->json($Client, 200); }

		public function delete($numCli) {
		Client::findOrFail($numCli)->delete();
		return response('Deleted Successfully', 200); }

	
}
