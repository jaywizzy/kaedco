<?php

namespace App\Repositories\Feeder;
use App\Repositories\Feeder\FeederContract;
use App\Feeder;

class EloquentFeederRepository implements FeederContract
{

	public function create($request) {
		$feeder = new Feeder();
		$this->setFeederProperties($feeder, $request);
		$feeder->save();
		return $feeder;
	}

	public function  findAll()
    {
        return Feeder::all();
    }

	public function setFeederProperties($feeder, $request) {
		$feeder->name = $request->name;
		$feeder->feeder_nerc_code = $request->feeder_nerc_code;
		$feeder->feeder_kaedc_code = $request->feeder_kaedc_code;
		$feed1 = (str_split($request->area_office_name, 2));
		$feed2 = (str_split($request->substation_name, 3));
		$feeder->injection_code_nerc = $feed2[0];
		$feeder->injection_code_kaedc = $feed2[1];
		$feeder->area_office_code_nerc = $feed1[0];
		$feeder->area_office_code_kaedc = $feed1[1];		
	}
}
