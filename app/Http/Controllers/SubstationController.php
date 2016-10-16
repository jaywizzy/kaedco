<?php

namespace App\Http\Controllers;

use App\Repositories\Substation\SubstationContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubstationController extends Controller
{
    protected $repo;
    protected $areaOfficeRepo;

    public function __construct(SubstationContract $substationContract, AreaOfficeContract $areaOfficeContract){
        $this->repo = $substationContract;
        $this->areaOfficeRepo = $areaOfficeContract;

    }
    public function create(){
        $substations = $this->repo->findAll();
        $areaOffices = $this->areaOfficeRepo->findAll();
        return view('substation.create')->with('substations', $substations)->with('areaOffices', $areaOffices);
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'substation_name' => 'required',
                'injectionCode' => 'required',
                'area_office_nerc' => 'required',
                'area_office_kaedc' => 'required',
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
