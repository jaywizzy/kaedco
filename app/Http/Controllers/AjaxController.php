<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\AreaOffice\AreaOfficeContract;
use App\Repositories\Substation\SubstationContract;
use App\Repositories\Feeder\FeederContract;
use App\Repositories\Transformer\TransformerContract;
use App\Repositories\HighTension\HighTensionContract;
use App\Http\Requests;

class AjaxController extends Controller
{
    protected $areaOfficeRepo;
    protected $substationRepo;
    protected $feederRepo;
    protected $hightensionRepo;
    protected $tranformerRepo;

    public function __construct(AreaOfficeContract $areaOfficeContract, SubstationContract $substationContract,
       							 FeederContract $feederContract, TransformerContract $transformerContract,HighTensionContract $hightensionContract) {
            $this->areaOfficeRepo = $areaOfficeContract;
            $this->substationRepo = $substationContract;
            $this->feederRepo = $feederContract;
            $this->hightensionRepo = $hightensionContract;
            $this->tranformerRepo = $transformerContract;
    }
    
    public function findSubstationByAreaNercCode(Request $request) {
        $areaofficecode = $request->areaofficecode;
        return $this->substationRepo->findSubstationByAreaCode($areaofficecode);
    }

    public function findTransformerByHighTension(Request $request) {
        $substationcode = $request->substationcode;
        return $this->feederRepo->findFeederBySubstation($substationcode);
    }

    // public function findTransformerByHighTension(Request $request) {
    // 	$areaofficecode = $request->areaoffice;
    // 	$substationcode = $request->substation;
    // 	$feedercode = $request->feeder;
    // 	$hightensioncode = $request->hightension;
    // 	$substations = $this->substationRepo->findSubstationByAreaCode($areaofficecode);
    // 	$this->findFeeder($request, $substations);
    // }

    public function findHightension(Request $request){
    	$feedercode = $request->feeder;
    	return $this->hightensionRepo->findHightensionByFeeder($feedercode);

    }
}