<?php

namespace App\Http\Controllers;

use App\Repositories\Substation\SubstationContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubstationController extends Controller
{
      /**
   * @var repo
   * @var $areaofficeRepo
   */
    protected $repo;
    protected $areaOfficeRepo;

<<<<<<< HEAD
    /**
    * @var constructor 
    */
    public function __construct(SubstationContract $substationContract, AreaOfficeContract $areaOfficeContract){
=======

    /**
    * @var constructor 
    */
    public function __construct(SubstationContract $substationContract, AreaOfficeContract $areaofficeContract){
>>>>>>> ed0d7df002106ba7e102b844acefc7f843350e47
        $this->repo = $substationContract;
        $this->areaOfficeRepo = $areaOfficeContract;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $substations = $this->repo->findAll();
<<<<<<< HEAD
        $areaOffices = $this->areaOfficeRepo->findAll();
         // load the create form (app/views/substation/create.blade.php)
        return view('substation.create')->with('substations', $substations)->with('areaOffices', $areaOffices);
=======

        $areaoffices = $this->areaofficeRepo->findAll();
         // load the create form (app/views/substation/create.blade.php)
        return view('substation.create')->with('substations', $substations)->with('areaoffices', $areaoffices);

>>>>>>> ed0d7df002106ba7e102b844acefc7f843350e47
    }
    
    /**
     * Store a newly created resource in storage.
     *Validate the forms required 
     * @return Response
     */
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
