<?php

namespace App\Http\Controllers;

use App\Repositories\Substation\SubstationContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubstationController extends Controller
{
    protected $repo;
    protected $areaofficeRepo;

    public function __construct(SubstationContract $substationContract, AreaOfficeContract $areaofficeContract){
        $this->repo = $substationContract;
        $this->areaofficeRepo = $areaofficeContract;

    }
    public function create(){
        $substations = $this->repo->findAll();
        $areaoffices = $this->areaofficeRepo->findAll();
        return view('substation.create')->with('substations', $substations)->with('areaoffices', $areaoffices);
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'substation_name' => 'required',
                'injection_nerc_code' => 'required|min:3|max:3',
                'injection_kaedc_code' => 'required|min:3|max:3',
                'area_office_name' => 'required',
            ]);

        $substation = $this->repo->create($request);
        if ($substation->injection_nerc_code) {
            return back()
                ->with('success', 'Sub-Station successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating the sub-station. Try again');
        }
    }
}
