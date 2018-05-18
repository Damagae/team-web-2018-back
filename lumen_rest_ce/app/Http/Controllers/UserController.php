<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use vendor\Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
		{
		public function showAllUser()
		{
			return response()->json(User::all());
		}

		public function showOneUser($numUser)
		{
			return response()->json(User::find($numUser));
		}

		public function create(Request $request)
		{
			$User = User::create($request->all());
			return response()->json($User, 201);
		}

		public function update($numUser, Request $request)
		{
			$User = User::findOrFail($numUser); $User->update($request->all());
			return response()->json($User, 200);
		}

		public function delete($numUser)
		{
			User::findOrFail($numUser)->delete();
			return response('Deleted Successfully', 200);
		}

		// TEST - tous les Users
		public function all()
		{
		$carbon = new Carbon();
		$carbon = Carbon::now('Europe/London');
		$results = DB::select("SELECT * FROM Florist");
		return $results;
		}

		// TEST - fonction de débug
		public function test()
		{
		$carbon = new Carbon();
		$carbon = Carbon::now('Europe/London');
		//$results=DB::table('Commande')->get();
				//  ->join('controle','Commande.numCom','=','controle.numCom')
				//  ->join('Florist','controle.numUser','=','Florist.numUser')
				//  ->select('Commande.*')
				//  ->where(['Florist.numUser' => $numeroUser])
				//  ->where('Commande.dateCommande','>', $carbon->submonth())
		$results=DB::table('Commande')->get();
		return $results;
		}

		// ROUTE 08 - Ventes par mois par User
        public function monthlySales($numeroUser)
        {
        $carbon = new Carbon();
        $carbon = Carbon::now('Europe/London');
        $results=DB::table('Commande')
             ->join('controle','Commande.numCom','=','controle.numCom')
             ->join('Florist','controle.numUser','=','Florist.numUser')
             ->select('Commande.*')
             ->where(['Florist.numUser' => $numeroUser])
             ->where('Commande.dateCommande','>', $carbon->submonth())
             ->get();
             return $results;
        }
}
