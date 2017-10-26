<?php

namespace App\Http\Controllers;

use \App\Link
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
		//return redirect()->route('root') ;
		return view('submit');
	}

	public function post(Request $request) 
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required|max:255',
			'url' => 'required|max:255',
			'description' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect()
				->back()
				->withInput()
				->withErrors($validator);
		}
		$link = new Link;
		$link->title = $request->title;
		$link->url = $request->url;
		$link->description = $request->description;
		$link->save();
		return redirect()->route('root');
	}
}
