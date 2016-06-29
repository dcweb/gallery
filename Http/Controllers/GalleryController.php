<?php

namespace Dcms\Gallery\Http\Controllers;

use Dcms\Gallery\Models\Gallery;

use App\Http\Controllers\Controller;

use View;
use Input;
use Session;
use Validator;
use Redirect;
use DB;
use Datatable;
use Auth;
use DateTime;
use Config;


class GalleryController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// load the view
		return View::make('dcms::gallery/index');
	}


	public function getDatatable()
	{
		return Datatable::query(DB::connection('project')
																		->table('gallery')
																		->select('id','name','path')
																		)

																	->showColumns('name','path')
																	->addColumn('edit',function($model){return '<form method="POST" action="/admin/gallery/'.$model->id.'" accept-charset="UTF-8" class="pull-right"> <input name="_token" type="hidden" value="'.csrf_token().'"> <input name="_method" type="hidden" value="DELETE">
																			<a class="btn btn-xs btn-default" href="/admin/gallery/'.$model->id.'/edit"><i class="fa fa-pencil"></i></a>
																			<button class="btn btn-xs btn-default" type="submit" value="Delete this article" onclick="if(!confirm(\'Are you sure to delete this item?\')){return false;};"><i class="fa fa-trash-o"></i></button>
																		</form>';})
																	->searchColumns('node.title')
																	->make();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/articles/create.blade.php)
		return View::make('dcms::gallery/form');
	}

	public function striptopath($givenpath)
	{
		return strrev(substr(strrev($givenpath),strpos(strrev($givenpath),'/')));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$Languages = Language::all();
		$rules = array('name'=>'required','path'=>'required');
		$validator = Validator::make(Input::all(), $rules);

		// process the validator
		if ($validator->fails()) {
			return Redirect::to('admin/gallery/create')
				->withErrors($validator)
				->withInput();
		} else {
			// store


			$Gallery = new Gallery;

			$Gallery->name = Input::get('name');
			$Gallery->path = $this->striptopath(Input::get('path'));

			$Gallery->admin 				= Auth::guard('dcms')->user()->username;
			$Gallery->save();

			// redirect
			Session::flash('message', 'Successfully created gallery!');
			return Redirect::to('admin/gallery');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			// get the Page
			$Gallery = Gallery::find($id);

		 	// show the edit form and pass the nerd
			return View::make('dcms::gallery/form')
				->with('Gallery', $Gallery);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array('name'=>'required','path'=>'required');

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/gallery/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$Gallery = Gallery::find($id);

			$Gallery->name = Input::get('name');
			$Gallery->path = $this->striptopath(Input::get('path'));

			$Gallery->admin 				= Auth::guard('dcms')->user()->username;
			$Gallery->save();

			// redirect
			Session::flash('message', 'Successfully updated gallery!');
			return Redirect::to('admin/gallery');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$Gallery = Gallery::find($id);
		$Gallery->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the gallery!');
		return Redirect::to('admin/gallery');
	}
}
