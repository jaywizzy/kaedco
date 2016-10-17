<?php

/**
*	@author [Nani Paul] [nanipaul68@gmail.com]
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Transformer\TransformerContract;
use App\Repositories\Feeder\FeederContract;
use App\Repositories\HighTension\HighTensionContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use App\Repositories\Substation\SubstationContract;

class TransformerController extends Controller
{
    protected $repo;
    protected $feederRepo;
    protected $hightensionRepo;
    protected $areaoffficeRepo;
    protected $substationRepo;

    public function __construct(TransformerContract $transformerContract, FeederContract $feederContract, HighTensionContract $hightensionContract, AreaOfficeContract $areaofficeContract, SubstationContract $substationContract) {
    	$this->repo = $transformerContract;
    	$this->feederRepo = $feederContract;
    	$this->hightensionRepo = $hightensionContract;
    	$this->areaoffficeRepo = $areaofficeContract;
    	$this->substationRepo = $substationContract;
    }
    
    public function create() {
    	$transformers = $this->repo->findAll();
    	$feeders = $this->feederRepo->findAll();
    	$hightensions = $this->hightensionRepo->findAll();
    	$areaoffices = $this->areaoffficeRepo->findAll();
    	$substations = $this->substationRepo->findAll();
    	return view('transformer.create')->with('transformers', $transformers)
    									 ->with('feeders', $feeders)
    									 ->with('hightensions', $hightensions)
    									 ->with('areaoffices', $areaoffices)
    									 ->with('substations', $substations);
    }

    public function store(Request $request){
		$this->validate($request, 
		[
			'name' =>'required',
			'transformer_nerc_code' => 'required|min:3|max:3',
			'transformer_kaedc_code' => 'required|min:6|max:6',
			'area_office_name' => 'required',
			'substation_name' => 'required',
			'feeder_name' => 'required',
			'high_tension_name' => 'required',
		]);

		$transformer = $this->repo->create($request);
        if ($transformer->transformer_nerc_code) {
            return back()
                ->with('success', 'Transformer successfully registered.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem creating this Transformer. Try again');
        }
	}
}
