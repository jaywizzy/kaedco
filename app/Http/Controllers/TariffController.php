<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Tariff;

use App\Repositories\Tariff\TariffContract;

class TariffController extends Controller
{
    

    protected $repo;

    public function __construct(TariffContract $tariffContract) {
        $this->repo = $tariffContract;
    }

    public function create() {
    	$tariffs = $this->repo->findAll();
    	return view('tariff.create')->with('tariffs', $tariffs);
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
