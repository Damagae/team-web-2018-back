<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
		

		// ROUTE 08 - Ventes par mois par User
    public function monthlySales($numeroUser)
    {
	    $carbon = new Carbon();
	    $carbon = Carbon::now('Europe/London');
	    $results=DB::table('commande')
	         ->join('controle','commande.numcom','=','controle.numcom')
	         ->join('florist','controle.numuser','=','florist.numuser')
	         ->select('commande.*')
	         ->where(['florist.numuser' => $numeroUser])
	         ->where('commande.datecommande','>', $carbon->submonth())
	         ->get();
	    return $results;
	  }
}
