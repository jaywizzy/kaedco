<?php

namespace App\Http\Controllers;

use App\Substation;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubstationController extends Controller
{
    protected $repo;

    public function __construct(SubstationContract $substationContract){
        $this->repo = $substationContract;

    }
    public function create(){
        $substations = $this->repo->findAll();
        return view('substation.create')->with('substations', $substations);
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'name' => 'required',
                'injectionCode' => 'requireed',
                'area_code_nerc' => 'required',
                'area_code_nerc' => 'required',
            ]);

        $substation = $this->repo->create($request);
        if ($substation->injectionCode) {
            return back()
                ->with('success', 'Sub-Statioin successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating the sub-station. Try again');
        }
    }
}
