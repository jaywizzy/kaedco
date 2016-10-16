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

    public function findById($substationid)
    {
        return Substation::find($substationid);

    }

    public function  findAll()
    {
        return Substation::all();
    }

    public function setSubstationProperties($substation, $request){
        $substation->substation = $request->substation;

    }
}
