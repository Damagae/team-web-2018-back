<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
		{
		public function showAllUser() {
		return response()->json(User::all()); }

		public function showOneUser($numUser) {
		return response()->json(User::find($numUser)); }

		public function create(Request $request) {
		$User = User::create($request->all()); 
		return response()->json($User, 201);
		}

		public function update($numUser, Request $request) {
		$User = User::findOrFail($numUser); $User->update($request->all());
		return response()->json($User, 200); }

		public function delete($numUser) {
		User::findOrFail($numUser)->delete();
		return response('Deleted Successfully', 200); }
}
