<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Repositories\Feeder\FeederContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use App\Repositories\Substation\SubstationContract;
use App\AreaOffice;
use App\Substation;

class FeederController extends Controller
{
    protected $repo;
    protected $areaRepo;
    protected $substationRepo;

    public function __construct(FeederContract $feederContract, AreaOfficeContract $areaOfficeContract, SubstationContract $substationContract)
    {
    	$this->repo = $feederContract;
        $this->areaRepo = $areaOfficeContract;
        $this->substationRepo = $substationContract;
    }

    public function create() {
        $feeders = $this->repo->findAll();
        $areaoffices = $this->areaRepo->findAll();
        $substations = $this->substationRepo->findAll();
        return view('feeder.create')->with('areaoffices', $areaoffices)
                                    ->with('substations', $substations)
                                    ->with('feeders', $feeders);
    }

    public function index() {
        $feeders = $this->repo->findAll();
        $areaoffices = $this->areaRepo->findAll();
        $substations = $this->substationRepo->findAll();
        return view('feeder.index')->with('areaoffices', $areaoffices)
                                    ->with('substations', $substations)
                                    ->with('feeders', $feeders);
    }

    public function ajaxCall(Request $request) {
        $feeders = $this->repo->findAll();
        $areaoffice = $request->area_office_name;
        $areaoffices = AreaOffice::where('area_office_name', $areaoffice)->first();
        $substations = Substation::where('area_office_nerc', $areaoffices->nerc_code)->get();
        return $substations;
    }

    public function store(Request $request) {
    	$this->validate($request,  
        [
    		'name' => 'required',
    		'feeder_nerc_code' => 'required|min:2|max:2',
            'feeder_kaedc_code' => 'required|min:2|max:2',
    		'area_office_name' => 'required',
    		'substation_name' => 'required',
 
    	]);

    	$feeder = $this->repo->create($request);
    	if ($feeder->feeder_nerc_code) {
    		return back()
    			->with('success', 'Feeder successfully created.');
    	} else {
    		return  back()
    			->withInput()
    			->with('error', 'There was a problem creating the Feeder. Try again');
    	}
    }
}
