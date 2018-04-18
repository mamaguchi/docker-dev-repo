<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;

class DogsController extends Controller
{
    public function index(){
		return Dog::all();
	}
}
