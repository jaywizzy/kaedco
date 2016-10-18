<?php

namespace App\Repositories\Substation;

use App\Substation;

class EloquentSubstationRepository implements SubstationContract
{
    public function create($request)
    {
        $substation = new Substation();
        $this->setSubstationProperties($substation, $request);
        $substation->save();
        return $substation;
    }

    public function edit($substationid, $request)
    {
        $substation = $this->findById($substationid);
        $this->setSubstationProperties($substation, $request);
        $substation->save();
        return $substation;

    }

    public function remove($substatonid)
    {
        $substaton = $this->findById($substatonid);
        return $substaton->delete();

    }

    /**
     * Find an entity by id
     *
     * @param string $substationid
     * @return Illuminate\Database\Eloquent\Substation
     */
    public function findById($substationid)
    {
        return Substation::find($substationid);

    }

    public function  findAll()
    {
        return Substation::all();
    }

    private function setSubstationProperties($substation, $request){
        $substation->substation_name = $request->substation_name;
        $substation->injection_nerc_code = $request->injection_nerc_code;
        $substation->injection_kaedc_code = $request->injection_kaedc_code;
        $sub = (str_split($request->area_office_name, 2));
        $substation->area_office_nerc = $sub[0];
        $substation->area_office_kaedc = $sub[1];       

    }

    public function findSubstationByAreaCode($areaofficecode) {
        $areaofficecode = (str_split($areaofficecode, 2));
        $areaoffice = $areaofficecode[0];
        return Substation::where('area_office_nerc', $areaofficecode[0])->get();
    }
}
