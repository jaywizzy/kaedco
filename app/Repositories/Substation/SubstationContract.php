<?php

namespace App\Repositories\Substation;

interface SubstationContract
{
    public function create($request);
    public function edit($substationid, $request);
    public function remove($substationid);
    public function findById($substationid);
    public function findAll();
    public function findSubstationByAreaCode($areaofficecode);
}
