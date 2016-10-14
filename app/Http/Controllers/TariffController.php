<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

use App\Repositories\Tariff\TariffContract;
use App\Repositories\Category\CategoryContract;

class TariffController extends Controller
{
    

    protected $repo;
    protected $categoryRepo;

    public function __construct(TariffContract $tariffContract, CategoryContract $categoryContract) {
        $this->repo = $tariffContract;
        $this->categoryRepo = $categoryContract;
    }

    public function create() {
    	$tariffs = $this->repo->findAll();
    	$categories = $this->categoryRepo->findAll();
    	return view('tariff.create')->with('tariffs', $tariffs)->with('categories', $categories);
    }

   
    public function store(Request $request) {
        $this->validate($request, [
            'tariff_name' => 'required',
            // 'cetegory' => 'required',
            'rate' => 'required',
            
        ]);

        $tariff = $this->repo->create($request);
        if ($tariff->id) {
            return back()
                ->with('success', 'Tariff Plan successfully saved.');
        } else {
            return back()
                ->withInput()
                ->with('error', 'There was a problem saving the Tariff Plan. Try again');
        }


    }

    public function getEdit(){
    	$tariffid = $this->repo->findById($id);
    	return view('tariff.edit');
    }

    // public function remove() {
    //     // Ajax
    // }

    // public function showEdit($id) {
    //     $tariff = $this->repo->findById($id);
    //     return view('patient.edit', ['patient', $tariff]);
    // }

    // public function edit(Request $request, $id) {

    // }
    
    // public function searchTariffId(Request $request)
    // {
    //     $tariff = $this->repo->searchTariff($request);
    //     return back()
    //         ->withInput()
    //         ->with('patient', $tariff);
    // }
    
}
