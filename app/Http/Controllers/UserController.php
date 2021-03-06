<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as Model;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$query = Model::query();

		$query = handleWiths($query, $request->with);

		return $query->get();
	}

	/**
	 * Display the currently logged in user.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function auth(Request $request)
	{
		$id = $request->user('api')->id;

		$query = Model::query()->where('id', $id);

		$query = handleWiths($query, $request->with);

		return $query->first();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$model = new Model();

		$model->fill($request->except('password'));

		if ($request->password) {
			$model->password = bcrypt($request->password);
		}
		
		$model->save();

		return $model;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$query = Model::query()->where('id', $id);

		$query = handleWiths($query, $request->with);

		return $query->first();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$model = Model::find($id);

		$model->fill($request->except('password'));

		if ($request->password) {
			$model->password = bcrypt($request->password);
		}

		$model->save();

		return $model;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$model = Model::find($id);

		$model->delete();

		return $model;
	}
}
