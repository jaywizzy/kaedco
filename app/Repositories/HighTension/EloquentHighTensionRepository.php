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

	private function setHighTensionProperties($hightension, $request) {
		$hightension->name = $request->name;
		$hightension->high_tension_nerc_code = $request->high_tension_nerc_code;
		$hightension->high_tension_kaedc_code = $request->high_tension_kaedc_code;
		$high1= str_split($request->area_office_name, 2);
		$high2 = str_split($request->substation_name, 3);
		$high3= str_split($request->feeder_name, 2);
		$hightension->feeder_nerc_code= $high3[0];
		$hightension->feeder_kaedc_code= $high3[1];
		$hightension->injection_nerc_code= $high2[0];
		$hightension->injection_kaedc_code= $high2[1];
		$hightension->area_office_nerc_code= $high1[0];
		$hightension->area_office_kaedc_code= $high1[1];
	}

	public function findHightensionByFeeder($feedercode) {
		$feedercode = (str_split($feedercode, 2));
        $feeder = $feedercode[0];
		return HighTension::where('feeder_nerc_code', $feeder)->get();
	}
}
