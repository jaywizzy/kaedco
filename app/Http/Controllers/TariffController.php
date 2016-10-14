<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TariffController extends Controller
{
    public function create() {
    	return view('tariff.create');
    }
}
