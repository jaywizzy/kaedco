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

	public function setFeederProperties($feeder, $request) {
		$feeder->name = $request->name;
		$feeder->feeder_code = $request->feeder_code;
		$feeder->injection_code_nerc = $request->injection_code_nerc;
		$feeder->injection_code_kaedc = $request->injection_code_kaedc;
		$feeder->area_office_code_nerc = $request->area_office;
		$feeder->area_office_code_kaedc = $area_office_code_kaedc;
	}
}
