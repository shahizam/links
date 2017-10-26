<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Link;

class RootController extends Controller
{
	public function index()
    {
		$links = Link::all();
    	return view('welcome', [ 'links' => $links]);
    }
}