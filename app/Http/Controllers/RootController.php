<?php

namespace App\Http\Controllers;

use \App\Link;
use Illuminate\Http\Request;

class RootController extends Controller
{
	public function index()
    {
		$links = Link::all();
    	return view('welcome', [ 'links' => $links]);
    }
}