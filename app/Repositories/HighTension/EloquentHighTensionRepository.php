<?php

namespace App\Repositories\HighTension;

use App\Repositories\HighTension\HighTensionContract;
use App\HighTension;

class EloquentHighTensionRepository implements HighTensionContract
{
	public function create($request)
	{
		$hightension = new HighTension();
		$this->setHighTensionProperties($hightension, $request);
		$hightension->save();
		return $hightension;
	}

	public function edit($hightensionid, $request)
	{
		$hightension = $this->findById($hightensionid);
		$this->setHighTensionProperties($hightension, $request);
		$hightension->save();
		return $hightension;
	}

	public function remove($hightensionid)
	{
		$hightension = $this->findById($hightensionid);
		return $hightension->delete();

	}

	public function findById($hightensionid)
	{
		return HighTension::find($hightensionid);
	}

	public function  findAll()
	{
		return HighTension::all();
	}

	public function setHighTensionProperties($hightension, $request) {
		$hightension->hightension_code = $request->feeder_code_nerc;
		$hightension->feeder_code_nerc = $request->feeder_code_nerc;
		$hightension->feeder_code_kaedc = $request->feeder_code_kaedc;
		$hightension->injection_code_nerc = $request->injection_code_nerc;
		$hightension->injection_code_kaedc = $request->injection_code_kaedc;
		$hightension->area_office_code_nerc = $request->area_office_code_nerc;
		$hightension->area_office_code_nerc =  $request->area_office_code_nerc;

	}
}
