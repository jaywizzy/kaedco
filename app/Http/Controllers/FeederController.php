<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Repositories\Feeder\FeederContract;

class FeederController extends Controller
{
    protected $repo;

    public function __construct(FeederContract $feederContract)
    {
    	$this->repo = $feederContract;
    }

    public function create() {
        return view('feeder.create');
    }

    public function store(Request $request) {
    	$this->validate($request,  
        [
    		'name' => 'required',
    		'feeder_code' => 'required',
    		'injection_code_nerc' => 'required',
    		'injection_code_kaedc' => 'required',
    		'area_office_code_nerc' => 'required',
    		'area_office_code_kaedc' => 'required',
    	]);

    	$feeder = $this->repo->create($request);
    	if ($feeder->area_office_code_nerc) {
    		return back()
    			->with('success', 'Feeder successfully created.');
    	} else {
    		return  back()
    			->withInput()
    			->with('error', 'There was a problem creating the Feeder. Try again');
    	}
    }
}
