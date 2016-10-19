<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TransformerBookCode\TransformerBookCodeContract;
use App\Repositories\AreaOffice\AreaOfficeContract;
use App\Repositories\Transformer\TransformerContract;
use App\Repositories\BookCode\BookCodeContract;

class TransformerBookCodeController extends Controller
{
	protected $repo;
	protected $areaofficeRepo;
	protected $transformerRepo;
	protected $bookcodeRepo;

	public function __construct(TransformerBookCodeContract $transformerBookCodeContract, AreaOfficeContract $areaOfficeContract, TransformerContract $transformerContract, BookCodeContract $bookcodeContract) {
		$this->repo =  $transformerBookCodeContract;
		$this->areaofficeRepo = $areaOfficeContract;
		$this->transformerRepo = $transformerContract;
		$this->bookcodeRepo = $bookcodeContract;
	}

    public function create() {
    	$transformerbookcodes = $this->repo->findAll();
    	$areaoffices = $this->areaofficeRepo->findAll();
    	$transformers = $this->transformerRepo->findAll();
    	$bookcodes = $this->bookcodeRepo->findAll();
    	return view('transformerbookcode.create')->with('transformerbookcodes', $transformerbookcodes)
    			->with('areaoffices', $areaoffices)
    			->with('transformers', $transformers)
    			->with('bookcodes',$bookcodes);
    }

    public function store(Request $request) {
    	$this->validate($request, [

    	]);
    	$transformerbookcode = $this->repo->create($request);
    	if ($transformerbookcode->id) {
    		return back()
    				->with('success', 'Transformer Book Code successfully created');
    	} else {
    		return back()
    				->withInput()
    				->with('error', 'There was a problem   creating a Transformer Book Code.Try again!');
    	}
    }
}
