<?php

namespace App\Http\Controllers;

use App\Repositories\HighTension\HighTensionContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use App\Repositories\Substation\SubstationContract;
use App\Repositories\Feeder\FeederContract;

use Illuminate\Http\Request;

use App\Http\Requests;

class HighTensionController extends Controller
{
    protected $repo;
    protected $areaofficerepo;
    protected $substationrepo;
    protected $feederrepo;

	public function __construct(HighTensionContract $highTensionContract, AreaOfficeContract $areaOfficeContract, SubstationContract $substationContract, FeederContract $feederContract){
		$this->repo = $highTensionContract;
		$this->areaofficerepo = $areaOfficeContract;
		$this->substationrepo = $substationContract;
		$this->feederrepo = $feederContract;

	}
	public function create(){
		$hightensions = $this->repo->findAll();
		$areaoffices = $this->areaofficerepo->findAll();
		$substations = $this->substationrepo->findAll();
		$feeders = $this->feederrepo->findAll();
		return view('hightension.create')->with('hightensions', $hightensions)
										 ->with('areaoffices', $areaoffices)
										 ->with('substations', $substations)
										 ->with('feeders', $feeders);
	}

	public function store(Request $request){
		$this->validate($request, 
		[
			'title' => 'required',
			'footer' => 'required',
			'year' => 'required',
			'month' => 'required',
			'company_code' => 'required',
		]);

		$hightension = $this->repo->create($request);
        if ($hightension->high_tension_code) {
            return back()
                ->with('success', 'High Tension successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating this high tension. Try again');
        }
	}
}
